<?php namespace System;

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
        'System\Entities\Audit',
        'System\Entities\Lookup',
        'System\Entities\Setting',
        // events
        'System\Events\AuditListener',
        'System\Events\LookupListener',
        'System\Events\SettingListener',
        // services
        'System\Services\AuditService',
        'System\Services\LookupService',
        'System\Services\SettingService',
        // aliases
        'AuditService',
        'LookupService',
        'SettingService'
    ];
}