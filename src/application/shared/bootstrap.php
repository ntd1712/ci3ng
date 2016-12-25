<?php

// register Composer autoload
require_once ($srcPath = __DIR__ . '/../../') . 'vendor/autoload.php';

// load .env
(new Dotenv\Dotenv($srcPath))->load();