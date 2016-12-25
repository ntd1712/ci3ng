<?php namespace Account\Entities;

use Chaos\Common\AbstractBaseEntity;

/**
 * Class UserRole
 * @author ntd1712
 *
 * @Doctrine\ORM\Mapping\Entity(repositoryClass="Account\Repositories\UserRoleRepository")
 * @Doctrine\ORM\Mapping\EntityListeners({ "Account\Events\UserRoleListener" })
 * @Doctrine\ORM\Mapping\Table(name="user_role")
 */
class UserRole extends AbstractBaseEntity
{
    /**
     * @Doctrine\ORM\Mapping\Id
     * @Doctrine\ORM\Mapping\ManyToOne(targetEntity="User", inversedBy="Roles")
     * @Doctrine\ORM\Mapping\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $User;
    /**
     * @Doctrine\ORM\Mapping\Id
     * @Doctrine\ORM\Mapping\ManyToOne(targetEntity="Role", inversedBy="Users", fetch="EAGER")
     * @Doctrine\ORM\Mapping\JoinColumn(name="role_id", referencedColumnName="id")
     */
    protected $Role;
    /**
     * @Doctrine\ORM\Mapping\Column(name="is_primary", type="boolean", nullable=true)
     */
    protected $IsPrimary;

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->User;
    }

    /**
     * @param User $User
     * @return $this
     */
    public function setUser($User)
    {
        $this->User = $User;
        return $this;
    }

    /**
     * @return Role
     */
    public function getRole()
    {
        return $this->Role;
    }

    /**
     * @param Role $Role
     * @return $this
     */
    public function setRole($Role)
    {
        $this->Role = $Role;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsPrimary()
    {
        return $this->IsPrimary;
    }

    /**
     * @param bool $IsPrimary
     * @return $this
     */
    public function setIsPrimary($IsPrimary)
    {
        $this->IsPrimary = $IsPrimary;
        return $this;
    }
}