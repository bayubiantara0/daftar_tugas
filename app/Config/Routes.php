<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->match(['get','post'],'/daftartugas/datatables', 'Home::datatables');
$routes->post('/daftartugas/delete', 'Home::delete');
