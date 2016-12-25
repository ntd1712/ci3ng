<?php namespace Account\Repositories;

use Chaos\Common\AbstractDoctrineRepository;

/**
 * Class PermissionRepository
 * @author ntd1712
 */
class PermissionRepository extends AbstractDoctrineRepository
{
    /**
     * @param   string $ids
     * @return  \Account\Entities\Permission[]
     */
    public function getByIds($ids)
    {
        return $this->findBy(['Id' => $ids]);
    }
}