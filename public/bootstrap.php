<?php

use app\core\Router;
use Dotenv\Dotenv;

require '../vendor/autoload.php';

session_start();
// session_destroy();
// die();

$dotenv = Dotenv::createImmutable(dirname(__FILE__, 2));
$dotenv->load();

$route = new Router;
