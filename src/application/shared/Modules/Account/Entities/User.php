<?php namespace Account\Entities;

use Chaos\Common\AbstractBaseEntity;
use Chaos\Common\Traits\AuditEntityTrait;
use Chaos\Common\Traits\IdentityEntityTrait;

/**
 * Class User
 * @author ntd1712
 *
 * @Doctrine\ORM\Mapping\Entity(repositoryClass="Account\Repositories\UserRepository")
 * @Doctrine\ORM\Mapping\EntityListeners({ "Account\Events\UserListener" })
 * @Doctrine\ORM\Mapping\Table(name="user")
 */
class User extends AbstractBaseEntity
{
    use IdentityEntityTrait, AuditEntityTrait;

    /**
     * @Doctrine\ORM\Mapping\Column(name="name", type="string")
     * [NotEmpty]
     */
    protected $Name;
    /**
     * @Doctrine\ORM\Mapping\Column(name="email", type="string", nullable=true)
     * [EmailAddress]
     */
    protected $Email;
    /**
     * @Doctrine\ORM\Mapping\Column(name="password", type="string", nullable=true)
     */
    private $Password;
    /**
     * @Doctrine\ORM\Mapping\Column(name="password_expiry_date", type="datetime", nullable=true)
     */
    private $PasswordExpiryDate;
    /**
     * @Doctrine\ORM\Mapping\Column(name="remember_token", type="string", length=100, nullable=true)
     */
    private $RememberToken;
    /**
     * @Doctrine\ORM\Mapping\Column(name="open_id", type="string", length=64, nullable=true)
     * [IgnoreRules]
     */
    private $OpenId;
    /**
     * @Doctrine\ORM\Mapping\Column(name="locale", type="string", length=20, nullable=true)
     * [HtmlEntities]
     */
    protected $Locale = 'en';
    /**
     * @Doctrine\ORM\Mapping\Column(name="timezone", type="string", nullable=true)
     * [HtmlEntities]
     */
    protected $Timezone = 'Asia/Tokyo';
    /**
     * @Doctrine\ORM\Mapping\Column(name="profile", type="json_array", length=65535, nullable=true)
     */
    protected $Profile;
    /**
     * @Doctrine\ORM\Mapping\OneToMany(targetEntity="UserRole", mappedBy="User", cascade={"all"})
     * [IgnoreData]
     */
    protected $Roles;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @param string $Name
     * @return $this
     */
    public function setName($Name)
    {
        $this->Name = $Name;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @param string $Email
     * @return $this
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * @param string $Password
     * @return $this
     */
    public function setPassword($Password)
    {
        $this->Password = $Password;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPasswordExpiryDate()
    {
        return $this->PasswordExpiryDate;
    }

    /**
     * @param \DateTime $PasswordExpiryDate
     * @return $this
     */
    public function setPasswordExpiryDate($PasswordExpiryDate)
    {
        $this->PasswordExpiryDate = $PasswordExpiryDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getRememberToken()
    {
        return $this->RememberToken;
    }

    /**
     * @param string $RememberToken
     * @return $this
     */
    public function setRememberToken($RememberToken)
    {
        $this->RememberToken = $RememberToken;
        return $this;
    }

    /**
     * @return string
     */
    public function getOpenId()
    {
        return $this->OpenId;
    }

    /**
     * @param string $OpenId
     * @return $this
     */
    public function setOpenId($OpenId)
    {
        $this->OpenId = $OpenId;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->Locale;
    }

    /**
     * @param string $Locale
     * @return $this
     */
    public function setLocale($Locale)
    {
        $this->Locale = $Locale;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimezone()
    {
        return $this->Timezone;
    }

    /**
     * @param string $Timezone
     * @return $this
     */
    public function setTimezone($Timezone)
    {
        $this->Timezone = $Timezone;
        return $this;
    }

    /**
     * @return string
     */
    public function getProfile()
    {
        return $this->Profile;
    }

    /**
     * @param string $Profile
     * @return $this
     */
    public function setProfile($Profile)
    {
        $this->Profile = $Profile;
        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getRoles()
    {
        return $this->Roles;
    }
}