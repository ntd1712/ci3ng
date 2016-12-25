<?php namespace System\Entities;

use Chaos\Common\AbstractBaseEntity;
use Chaos\Common\Traits\AuditEntityTrait;
use Chaos\Common\Traits\IdentityEntityTrait;

/**
 * Class Setting
 * @author ntd1712
 *
 * @Doctrine\ORM\Mapping\Entity(repositoryClass="System\Repositories\SettingRepository")
 * @Doctrine\ORM\Mapping\EntityListeners({ "System\Events\SettingListener" })
 * @Doctrine\ORM\Mapping\Table(name="setting")
 */
class Setting extends AbstractBaseEntity
{
    use IdentityEntityTrait, AuditEntityTrait;

    /**
     * @Doctrine\ORM\Mapping\Column(name="name", type="string")
     * [NotEmpty|Alpha]
     */
    protected $Name;
    /**
     * @Doctrine\ORM\Mapping\Column(name="value", type="text", length=65535)
     * [HtmlEntities]
     */
    protected $Value;
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
    public function getValue()
    {
        return $this->Value;
    }

    /**
     * @param string $Value
     * @return $this
     */
    public function setValue($Value)
    {
        $this->Value = $Value;
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