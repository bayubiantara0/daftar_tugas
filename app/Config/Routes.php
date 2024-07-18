<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->match(['get','post'],'/daftartugas/datatables', 'Home::datatables');
$routes->post('/daftartugas/delete', 'Home::delete');
$routes->get('/daftartugas/getedit/(:num)', 'Home::get_edit/$1');
$routes->post('/daftartugas/addgrade', 'Home::addtugas');
$routes->get('/daftartugas/getview/(:num)', 'Home::get_view/$1');
$routes->post('/daftartugas/update', 'Home::update');
