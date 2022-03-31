<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
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

$routes->get('/', 'View::index');
$routes->get('/login', 'View::login_view');
$routes->get('/register', 'View::register_view');
$routes->get('/find', 'View::find_view');
$routes->get('/pet/(:num)', 'View::pet_view/$1');
$routes->get('/person', 'View::person_view', ["filter" => "auth"]);
$routes->get('/publish', 'View::publish_view');
//Login And Logout Route
$routes->post('/login', 'LoginController::Login');
$routes->get('/logout', 'LoginController::Logout');


//Register Route
$routes->post('/register', 'RegisterController::creatRegister');

// Pet
$routes->post('/loadPet', 'PetController::loadPetData');
$routes->post('/condition', 'PetController::conditionSelectPet');

//User Data
$routes->post('/updatePhoto', 'UserController::updateUserPhoto'); //修改個人圖片測試api

// Published
$routes->post('/createPublish', 'PublishedController::createPublish'); //修改個人圖片測試api


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
