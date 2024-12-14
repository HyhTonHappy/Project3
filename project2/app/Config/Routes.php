<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/list', 'ListSub::index'); 
$routes->get('/add_Sub', 'AddTodo::index'); 
$routes->post('/addSub/store', 'AddTodo::store'); 
$routes->get('deleteSub/(:num)', 'DeleteTodo::delete/$1');  
$routes->get('editSub/(:num)', 'EditTodo::edit/$1'); 
$routes->post('editSub/update/(:num)', 'EditTodo::update/$1');



