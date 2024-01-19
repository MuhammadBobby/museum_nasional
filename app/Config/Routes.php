<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// get
$routes->get('/koleksi', 'Koleksi::index');

// detail
$routes->get('/koleksi/detail/(:any)', 'Koleksi::detail/$1');

// admin
$routes->get('/admin', 'Admin::index');
// detail
$routes->get('/admin/detail/(:num)', 'Admin::detail/$1');
// create
$routes->get('/admin/create', 'Admin::create');
$routes->post('/admin/save', 'Admin::save');
// edit
$routes->get('/admin/edit/(:num)', 'Admin::edit/$1');
$routes->post('/admin/update/(:num)', 'Admin::update/$1');
// delete
$routes->delete('/admin/delete/(:num)', 'Admin::delete/$1');


// search
$routes->post('/search/(:segment)', 'Admin::search/$1');

// login
$routes->post('/admin/check', 'Admin::check');
