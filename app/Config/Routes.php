<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('auth/login', 'Auth::login');
$routes->post('auth/login', 'Auth::login');
$routes->get('auth/register', 'Auth::register');
$routes->post('auth/register', 'Auth::register');
$routes->get('auth/logout', 'Auth::logout');
$routes->get('admin', 'Admin::index');
$routes->get('admin/view_records', 'Admin::view_records');
$routes->get('admin/view_records/(:any)', 'Admin::view_records/$1');
$routes->get('users', 'Users::index');
$routes->get('users/new', 'Users::new');
$routes->post('users/create', 'Users::create');