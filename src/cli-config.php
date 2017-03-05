<?php

// CodeIgniter
require_once __DIR__ . '/application/shared/bootstrap.php';

// Doctrine
$config = glob(__DIR__ . '/application/shared/Modules/*/settings.yml', GLOB_NOSORT);
array_unshift($config, __DIR__ . '/application/shared/Modules/settings.yml');

$config['__options__'] = [
    'cache_path' => __DIR__ . '/application/system/cache',
    'replacements' => [
        'base_path' => __DIR__ . '/application/system',
        'base_url' => ''
    ]
];

$entityManager = Chaos\Bridge\Doctrine\EntityManagerFactory::createInstance()->setConfig($config)->getEntityManager();
return Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);