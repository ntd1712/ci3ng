<?php namespace Account;

use Chaos\Common\AbstractLeagueServiceProvider;

/**
 * Class Module
 * @author ntd1712
 */
class Module extends AbstractLeagueServiceProvider
{
    /** @var array */
    protected $provides = [
        // entities
        'Account\Entities\Permission',
        'Account\Entities\Role',
        'Account\Entities\User',
        'Account\Entities\UserRole',
        // events
        'Account\Events\PermissionListener',
        'Account\Events\RoleListener',
        'Account\Events\UserListener',
        'Account\Events\UserRoleListener',
        // services
        'Account\Services\PermissionService',
        'Account\Services\RoleService',
        'Account\Services\UserService',
        'Account\Services\UserRoleService',
        // aliases
        'PermissionService',
        'RoleService',
        'UserService',
        'UserRoleService'
    ];
}