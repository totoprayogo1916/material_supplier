<?php

use App\Controllers\Material;
use App\Controllers\Supplier;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('supplier/view', [Supplier::class, 'index'], ['as' => 'supplier.view']);
$routes->get('supplier/create', [Supplier::class, 'create'], ['as' => 'supplier.create']);
$routes->post('supplier/submit', [Supplier::class, 'submit'], ['as' => 'supplier.submit']);
$routes->get('supplier/delete/(:num)', [Supplier::class, 'delete'], ['as' => 'supplier.delete']);

$routes->get('material/view', [Material::class, 'index'], ['as' => 'material.view']);
$routes->get('material/create', [Material::class, 'create'], ['as' => 'material.create']);
$routes->post('material/submit', [Material::class, 'submit'], ['as' => 'material.submit']);
$routes->get('material/delete/(:num)', [Material::class, 'delete'], ['as' => 'material.delete']);

$routes->addRedirect('/', 'supplier.view');