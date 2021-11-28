<?php

use app\Controllers\AuthController;
use app\Controllers\DashboardController;
use app\Controllers\ProductController;

define('ROOT', pathinfo(__DIR__)['basename']);
define('BASE_PATH', pathinfo(__DIR__)['dirname']. '/'. ROOT);


require_once "bootstrap/autoload.php";


$router = new \app\Router();

$router->get('/', AuthController::class, 'loginForm');
$router->get('login', AuthController::class, 'loginForm');
$router->post('login', AuthController::class, 'login');
$router->get('registration', AuthController::class, 'registrationForm');
$router->post('registration', AuthController::class, 'registration');
$router->get('logout', AuthController::class, 'logoutUser');


$router->get('dashboard', DashboardController::class, 'index');


$router->get('products', ProductController::class, 'index');
$router->get('add-products', ProductController::class, 'addProduct');
$router->post('add-products', ProductController::class, 'storeProduct');

$router->get('get-products', ProductController::class, 'getProducts');





$router->dispatch();
