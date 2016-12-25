<?php namespace Shared\Classes;

use Doctrine\DBAL\Logging\DebugStack,
    Chaos\Common\AbstractCodeIgniterRestController;

define('REST_Controller', true);

/**
 * Class Controller
 * @author ntd1712
 *
 * @property-read \CI_Router $router
 */
abstract class Controller extends AbstractCodeIgniterRestController
{
    /** {@inheritdoc} */
    public function __construct()
    {
        static $active_group, $db;
        require APPPATH . 'config/database.php';
        $config = get_config();

        parent::__construct(
            array_replace_recursive([
                'app' => [
                    'charset' => $config['charset'],
                    'key' => env('APP_KEY'),
                    'url' => rtrim($config['base_url'], '/')
                ],
                'auth' => [
                    'drivers' => [
                        'jwt' => [
                            'secret' => env('APP_KEY'),
                            'ttl' => $config['sess_expiration']
                        ]
                    ]
                ],
                'db' => $db[$active_group] + [
                    'driver' => $db[$active_group]['dbdriver'],
                    'user' => $db[$active_group]['username'],
                    'host' => $db[$active_group]['hostname'],
                    'dbname' => $db[$active_group]['database'],
                    'prefix' => $db[$active_group]['dbprefix'],
                    'charset' => $db[$active_group]['char_set']
                ],
                'orm' => [
                    'cache' => [
                        'provider' => env('CACHE_DRIVER', 'array'),
                        'file' => [
                            'directory' => $config['cache_path'],
                            'extension' => '.' . $config['cookie_prefix'] . '.data'
                        ]
                    ],
                    'metadata' => [
                        'driver' => 'annotation',
                        'paths' => require_once __DIR__ . '/../Modules/doctrine.paths.php',
                        'simple' => false
                    ],
                    'proxy_classes' => [
                        'auto_generate' => $db[$active_group]['db_debug'] ? 2 : 0,
                        'directory' => $config['cache_path'] . 'proxies/',
                        'namespace' => null,
                    ],
                    'debug' => $db[$active_group]['db_debug'],
                    'default_repository' => DOCTRINE_ENTITY_REPOSITORY,
                    'sql_logger' => $db[$active_group]['db_debug'] ? new DebugStack : null,
                ],
                'mail' => [
                    'driver' => env('MAIL_DRIVER'),
                    'host' => env('MAIL_HOST'),
                    'port' => env('MAIL_PORT'),
                    'encryption' => env('MAIL_ENCRYPTION'),
                    'username' => env('MAIL_USERNAME'),
                    'password' => env('MAIL_PASSWORD')
                ],
                'session' => [
                    'cookie' => $config['sess_cookie_name'],
                    'expires' => $config['sess_expiration'],
                    'path' => $config['cookie_path'],
                    'domain' => $config['cookie_domain'],
                    'secure' => $config['cookie_secure'],
                    'http_only' => $config['cookie_httponly']
                ],
                'paths' => ['config' => $configPath = __DIR__ . '/../Modules/config.params.php'],
                'urls' => ['api' => empty($config['index_page']) ? '/api/' : '/' . $config['index_page'] . '/api/']
            ], require $configPath),
            require_once __DIR__ . '/../Modules/config.services.php'
        );
    }

    /**
     * Get the middleware assigned to the controller
     *
     * @return  array
     */
    public function getMiddleware()
    {
        return $this->middleware;
    }

    /**
     * Register middleware on the controller
     *
     * @param   string $middleware
     * @param   array $options
     * @return  $this
     */
    public function middleware($middleware, array $options = [])
    {
        $this->middleware[$middleware] = $options;
        return $this;
    }

    protected function runMiddleware()
    {
        $this->load->helper('inflector');

        foreach ($this->getMiddleware() as $middleware)
        {
            $middlewareArray = explode('|', str_replace(' ', '', $middleware));
            $middlewareName = $middlewareArray[0];
            $runMiddleware = true;

            if (isset($middlewareArray[1]))
            {
                $options = explode(':', $middlewareArray[1]);
                $type = $options[0];
                $methods = explode(',', $options[1]);

                if ($type == 'except')
                {
                    if (in_array($this->router->method, $methods))
                    {
                        $runMiddleware = false;
                    }
                }
                elseif ($type == 'only')
                {
                    if (!in_array($this->router->method, $methods))
                    {
                        $runMiddleware = false;
                    }
                }
            }

            $filename = ucfirst(camelize($middlewareName)) . 'Middleware';

            if ($runMiddleware == true)
            {
                if (file_exists($middlewarePath = APPPATH . 'middlewares/' . $filename . '.php'))
                {
                    require $middlewarePath;
                    $ci = &get_instance();
                    $object = new $filename($this, $ci);
                    $object->run();
                    $this->middleware[$middlewareName] = $object;
                }
                else
                {
                    if (ENVIRONMENT == 'development')
                    {
                        show_error('Unable to load middleware: ' . $filename . '.php');
                    }
                    else
                    {
                        show_error('Sorry something went wrong.');
                    }
                }
            }
        }
    }

    /**
     * The middleware registered on the controller
     *
     * @var array
     */
    protected $middleware = [];
}