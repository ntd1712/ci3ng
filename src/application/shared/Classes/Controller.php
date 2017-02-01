<?php namespace Shared\Classes;

use Chaos\Foundation\AbstractCodeIgniterRestController;

define('REST_Controller', true);

/**
 * Class Controller
 * @author ntd1712
 *
 * @property-read \CI_Router $router
 */
abstract class Controller extends AbstractCodeIgniterRestController
{
    /** {@inheritdoc} */
    public function __construct()
    {
        $config = glob(__DIR__ . '/../Modules/*/settings.yml', GLOB_NOSORT);
        array_unshift($config, __DIR__ . '/../Modules/settings.yml');

        $config['__options__'] = [
            'cache' => 'production' === ENVIRONMENT,
            'cache_path' => APPPATH . 'cache',
            'replacements' => [
                'base_path' => rtrim(APPPATH, DIRECTORY_SEPARATOR),
                'base_url' => rtrim(config_item('base_url'), '/')
            ]
        ];

        parent::__construct($config, glob(__DIR__ . '/../Modules/*/services.yml', GLOB_NOSORT));
    }
}