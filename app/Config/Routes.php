<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('register', 'Auth::register');
$routes->post('auth/handleRegister', 'Auth::handleRegister');
$routes->get('dashboard', 'Dashboard::index');
