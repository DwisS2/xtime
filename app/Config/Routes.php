<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->group('', ['filter' => 'login'], function($routes){
	$routes->get('users', 'Users::index');
	$routes->get('barang', 'Barang::index');
	$routes->get('feedback_admin', 'Feedbackadmin::index');
});

// route since we don't have to scan directories.

$routes->get('/about', 'Halaman::about');
$routes->get('/contact', 'Halaman::contact');
$routes->get('/', 'Halaman::logout');




$routes->get('/users', 'Users::index');
$routes->get('/users/create', 'Users::create');
$routes->post('/users/store', 'Users::store');
$routes->get('users/edit/(:num)', 'Users::edit/$1');
$routes->post('users/update/(:num)', 'Users::update/$1');
$routes->get('users/delete/(:num)', 'Users::delete/$1');

$routes->get('/feedback_admin', 'Feedbackadmin::index');
$routes->get('/feedback_admin/create', 'Feedbackadmin::create');
$routes->post('/feedback_admin/store', 'Feedbackadmin::store');
$routes->get('feedback_admin/edit/(:num)', 'Feedbackadmin::edit/$1');
$routes->post('feedback_admin/update/(:num)', 'Feedbackadmin::update/$1');
$routes->get('feedback_admin/delete/(:num)', 'Feedbackadmin::delete/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
