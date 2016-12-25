<?php namespace Account\Entities;

use Chaos\Common\AbstractBaseEntity;
use Chaos\Common\Traits\AuditEntityTrait;
use Chaos\Common\Traits\IdentityEntityTrait;

/**
 * Class Permission
 * @author ntd1712
 *
 * @Doctrine\ORM\Mapping\Entity(repositoryClass="Account\Repositories\PermissionRepository")
 * @Doctrine\ORM\Mapping\EntityListeners({ "Account\Events\PermissionListener" })
 * @Doctrine\ORM\Mapping\Table(name="permission")
 */
class Permission extends AbstractBaseEntity
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
}