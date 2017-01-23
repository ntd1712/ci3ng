<?php namespace System\Entities;

use Chaos\Foundation\AbstractBaseEntity,
    Chaos\Foundation\Traits\AuditEntityTrait,
    Chaos\Foundation\Traits\IdentityEntityTrait;

/**
 * Class Audit
 * @author ntd1712
 *
 * @Doctrine\ORM\Mapping\Entity(repositoryClass="System\Repositories\AuditRepository")
 * @Doctrine\ORM\Mapping\EntityListeners({ "System\Events\AuditListener" })
 * @Doctrine\ORM\Mapping\Table(name="audit")
 */
class Audit extends AbstractBaseEntity
{
    use IdentityEntityTrait, AuditEntityTrait;

    /**
     * @Doctrine\ORM\Mapping\Column(name="name", type="string")
     */
    protected $Name = 'Guest';
    /**
     * @Doctrine\ORM\Mapping\Column(name="action", type="string", nullable=true)
     */
    protected $Action;
    /**
     * @Doctrine\ORM\Mapping\Column(name="information", type="string", nullable=true)
     */
    protected $Information;
    /**
     * @Doctrine\ORM\Mapping\Column(name="type", type="string", length=20, nullable=true)
     */
    protected $Type = 'info';
    /**
     * @Doctrine\ORM\Mapping\Column(name="ip_address", type="string", length=50, nullable=true)
     */
    protected $IpAddress;
    /**
     * @Doctrine\ORM\Mapping\Column(name="params", type="text", length=65535, nullable=true)
     */
    protected $Request;
}