<?php namespace Account\Entities;

use Chaos\Common\AbstractBaseEntity;
use Chaos\Common\Traits\AuditEntityTrait;
use Chaos\Common\Traits\IdentityEntityTrait;

/**
 * Class Role
 * @author ntd1712
 *
 * @Doctrine\ORM\Mapping\Entity(repositoryClass="Account\Repositories\RoleRepository")
 * @Doctrine\ORM\Mapping\EntityListeners({ "Account\Events\RoleListener" })
 * @Doctrine\ORM\Mapping\Table(name="role")
 */
class Role extends AbstractBaseEntity
{
    use IdentityEntityTrait, AuditEntityTrait;

    /**
     * @Doctrine\ORM\Mapping\Column(name="name", type="string")
     * [NotEmpty|HtmlEntities]
     */
    protected $Name;
    /**
     * @Doctrine\ORM\Mapping\Column(name="description", type="string", nullable=true)
     * [HtmlEntities]
     */
    protected $Description;
    /**
     * @Doctrine\ORM\Mapping\ManyToMany(targetEntity="Permission")
     * @Doctrine\ORM\Mapping\JoinTable(name="role_permission",
     *  joinColumns={@Doctrine\ORM\Mapping\JoinColumn(name="role_id", referencedColumnName="id")},
     *  inverseJoinColumns={@Doctrine\ORM\Mapping\JoinColumn(name="permission_id", referencedColumnName="id")})
     * [IgnoreData]
     */
    protected $Permissions;
    /**
     * @Doctrine\ORM\Mapping\OneToMany(targetEntity="UserRole", mappedBy="Role")
     * [Ignore]
     */
    private $Users;

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
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * @param string $Description
     * @return $this
     */
    public function setDescription($Description)
    {
        $this->Description = $Description;
        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getPermissions()
    {
        return $this->Permissions;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getUsers()
    {
        return $this->Users;
    }
}