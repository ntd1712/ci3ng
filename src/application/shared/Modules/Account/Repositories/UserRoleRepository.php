<?php namespace Account\Repositories;

use Chaos\Common\AbstractDoctrineRepository;

/**
 * Class UserRoleRepository
 * @author ntd1712
 */
class UserRoleRepository extends AbstractDoctrineRepository
{
    /**
     * @param   int $value
     * @return  int
     */
    public function deleteByUser($value)
    {
        return $this->delete(['where' => ['User' => $value]]);
    }
}