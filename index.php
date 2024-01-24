<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::post('login', 'SecurityController');
Router::post('register', 'SecurityController');
Router::get('logout', 'SecurityController');
Router::get('service', 'ServiceController');
Router::post('addService', 'ServiceController');
Router::get('rent', 'RentController');
Router::get('bike_categories', 'RentController');
Router::post('submit_rent', 'RentController');
Router::get('profile', 'ProfileController');

Router::run($path);