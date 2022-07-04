<?php
require_once __DIR__ . './../vendor/autoload.php';

use app\controllers\SiteController;
use app\core\Application;

$app = new Application(dirname(__DIR__));


$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/addproduct', [SiteController::class, 'addProduct']);

$app->router->post('/addproduct', [SiteController::class, 'addProduct']);



$app->run();