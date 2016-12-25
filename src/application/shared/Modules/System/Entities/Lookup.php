<?php namespace System\Entities;

use Chaos\Common\AbstractBaseEntity;
use Chaos\Common\Traits\AuditEntityTrait;
use Chaos\Common\Traits\IdentityEntityTrait;

/**
 * Class Lookup
 * @author ntd1712
 *
 * @Doctrine\ORM\Mapping\Entity(repositoryClass="System\Repositories\LookupRepository", readOnly=true)
 * @Doctrine\ORM\Mapping\EntityListeners({ "System\Events\LookupListener" })
 * @Doctrine\ORM\Mapping\Table(name="lookup")
 */
class Lookup extends AbstractBaseEntity
{
    use IdentityEntityTrait, AuditEntityTrait;

    /**
     * @Doctrine\ORM\Mapping\Column(name="name", type="string")
     * [NotEmpty|HtmlEntities]
     */
    protected $Name;
    /**
     * @Doctrine\ORM\Mapping\Column(name="code", type="integer")
     * [NotEmpty]
     */
    protected $Code;
    /**
     * @Doctrine\ORM\Mapping\Column(name="type", type="string")
     * [NotEmpty]
     */
    protected $Type;
    /**
     * @Doctrine\ORM\Mapping\Column(name="position", type="integer", nullable=true, options={"unsigned"=true})
     */
    protected $Position;
}