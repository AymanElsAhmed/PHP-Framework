<?php

use app\controllers\SiteController;
use app\core\Application;


require_once __DIR__ . './../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];
$app = new Application(dirname(__DIR__), $config);


$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/addproduct', [SiteController::class, 'addProduct']);

$app->router->post('/addproduct', [SiteController::class, 'store']);



$app->run();
