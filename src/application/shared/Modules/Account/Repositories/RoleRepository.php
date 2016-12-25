<?php namespace Account\Repositories;

use Chaos\Common\AbstractDoctrineRepository;

/**
 * Class RoleRepository
 * @author ntd1712
 */
class RoleRepository extends AbstractDoctrineRepository
{
    /**
     * @param   string $ids
     * @return  \Account\Entities\Role[]
     */
    public function getByIds($ids)
    {
        return $this->findBy(['Id' => $ids]);
    }
}