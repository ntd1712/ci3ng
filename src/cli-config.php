<?php

// CodeIgniter
define('APPPATH', __DIR__ . '/application/system' . DIRECTORY_SEPARATOR);
require_once __DIR__ . '/application/shared/bootstrap.php';

// Doctrine
$config = glob(__DIR__ . '/application/shared/Modules/*/settings.yml', GLOB_NOSORT);
array_unshift($config, __DIR__ . '/application/shared/Modules/settings.yml');

$config['__options__'] = [
    'cache_path' => APPPATH . 'cache',
    'replacements' => [
        'base_path' => rtrim(APPPATH, DIRECTORY_SEPARATOR),
        'base_url' => ''
    ]
];

$entityManager = (new Chaos\Doctrine\EntityManagerFactory)->setConfig($config)->getEntityManager();
return Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);