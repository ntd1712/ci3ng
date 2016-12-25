<?php

use Carbon\Carbon,
    Emarref\Jwt,
    Chaos\Common\Exceptions;

/**
 * Class Auth
 * @author ntd1712
 *
 * @method array|string|null post($key = null, $xss_clean = null)
 * @property-read \CI_Output $output
 * @property-read \CI_Session $session
 */
class Auth extends \Shared\Classes\Controller
{
    /** {@inheritdoc} */
    public function index_get()
    {
        show_404();
    }

    /**
     * The "login" action
     *
     * @throws  Exceptions\ValidateException
     */
    public function login_post()
    {
        // are we logging out, or doing something else?
        if (true === (bool)$this->post('logout'))
        {
            $this->logout_post();
            return;
        }

        // do some checks
        if (empty($this->post('email')) || false === filter_var($this->post('email'), FILTER_VALIDATE_EMAIL))
        {
            throw new Exceptions\ValidateException('Email is empty or invalid');
        }

        if (empty($this->post('password')))
        {
            throw new Exceptions\ValidateException('Password is empty');
        }

        /** @var \Account\Entities\User $entity */
        $entity = $this->getService('User')->getByEmail($this->post('email'));

        if (null === $entity || !password_verify($this->post('password'), $entity->getPassword()))
        {
            throw new Exceptions\ValidateException('Invalid credentials');
        }

        // prepare data
        $user = $entity->toSimpleArray();
        $user['Roles'] = $user['Permissions'] = [];

        if (0 !== count($roles = $entity->getRoles()))
        {   /** @var \Account\Entities\UserRole $userRole */
            foreach ($roles as $userRole)
            {
                $user['Roles'][strtolower($userRole->getRole()->getName())] = $userRole->getRole()->getId();

                if (0 !== count($permissions = $userRole->getRole()->getPermissions()))
                {   /** @var \Account\Entities\Permission $permission */
                    foreach ($permissions as $permission)
                    {
                        $user['Permissions'][strtolower($permission->getName())] = $permission->getId();
                    }
                }
            }
        }

        // save into session
        $this->session->set_userdata('loggedName', $user['Name']);
        $this->session->set_userdata('loggedUser', $user);

        // generate JWT
        $algorithm = new Jwt\Algorithm\Hs256($this->getConfig()->get('auth.drivers.jwt.secret'));
        $token = new Jwt\Token;
        $token->addClaim(new Jwt\Claim\Issuer($appKey = $this->getConfig()->get('app.key')));
        $token->addClaim(new Jwt\Claim\Subject($user['Name']));
        $token->addClaim(new Jwt\Claim\Audience([$appKey]));
        $token->addClaim(new Jwt\Claim\Expiration(Carbon::now()->addSeconds($this->getConfig()->get('auth.drivers.jwt.ttl'))->timestamp));
        $token->addClaim(new Jwt\Claim\NotBefore($timestamp = Carbon::now()->timestamp));
        $token->addClaim(new Jwt\Claim\IssuedAt($timestamp));
        $token->addClaim(new Jwt\Claim\JwtId(hash_hmac('tiger128,3', sprintf('ci3ng.%s.%s', $appKey, $timestamp), $appKey)));
        $token->addClaim(new Jwt\Claim\PublicClaim('context', ['user' => $user]));
        $token = (new Jwt\Jwt)->serialize($token, Jwt\Encryption\Factory::create($algorithm));

        // bye!
        $this->set_response(compact('token'));
    }

    /**
     * The "logout" action
     * @todo
     */
    public function logout_post()
    {
        // try
        // {
        //     \JWTAuth::invalidate(\JWTAuth::getToken());
        // }
        // catch (JWTException $e) {}

        $this->session->unset_userdata(['loggedName', 'loggedUser']);
        $this->set_response(['success' => true]);
    }

    /**
     * The "renewtoken" action
     * @todo
     */
    public function renewtoken_get()
    {
        $token = $this->get('token');

        if (empty($token))
        {
            throw new Exceptions\JWTException('A token is required', 400);
        }

        $algorithm = new Jwt\Algorithm\Hs256($appKey = $this->getConfig()->get('app.key'));
        $context = new Jwt\Verification\Context(Jwt\Encryption\Factory::create($algorithm));
        $context->setIssuer($appKey);
        $context->setSubject($this->session->userdata('loggedName'));
        $context->setAudience($appKey);

        $jwt = new Jwt\Jwt;
        $jwt->verify($jwt->deserialize($token), $context);

        // $newToken = $this->auth->setRequest($request)->parseToken()->refresh();
        // $this->output->set_header('Authorization: Bearer ' . $newToken);
    }

    private function verify()
    {
        $auth = isset($_SERVER['HTTP_AUTHORIZATION']) ? $_SERVER['HTTP_AUTHORIZATION'] : false;

        if (!$auth)
        {
            // Authorization header not found
        }

        list($jwt) = sscanf($auth, 'Bearer %s');

        if (!$jwt)
        {
            // No token found in authorization header?
        }

        try
        {
            $token = JWT::decode($jwt, $secret_key, array('HS256'));

            // check for issuer

            // check for subject
        }
        catch (Exception $e) {
            // rest_auth_invalid_token
        }
    }
}