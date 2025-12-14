<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/database.php';   

use Buki\Router\Router;

$router = new Router;

require __DIR__ . '/../config/routes.php';

$router->run();
