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
$routes->get('/mail', 'View::sendMail');
//Login And Logout Route
$routes->post('/login', 'LoginController::Login'); //checked
$routes->get('/logout', 'LoginController::Logout'); //checked


$routes->post('/rePassword', 'UserController::updateUserPassword', ["filter" => "auth"]); //checked
$routes->post('/sendMail', 'UserController::sendMail'); //checked
//Register Route
$routes->post('/register', 'RegisterController::creatRegister'); //checked

// Pet
$routes->get('/allPet', 'PetController::loadAllData');
$routes->get('/selectPet', 'PetController::selectPetData');
//User Data
$routes->post('/updatePhoto', 'UserController::updateUserPhoto', ["filter" => "auth"]); //修改個人圖片測試api
$routes->get('/userInfo', 'UserController::getUserInfo', ["filter" => "auth"]); //取得使用者資料 checked
$routes->post('/updateUserData', 'UserController::updateUserData', ["filter" => "auth"]);//更新使用者資料  checked
// Published
$routes->post('/createPublish', 'PublishedController::createPublish', ["filter" => "auth"]); 
$routes->post('/editPublish', 'PublishedController::editPublish', ["filter" => "auth"]); 
$routes->post('/deletePublish', 'PublishedController::deletePublish', ["filter" => "auth"]); 
$routes->get('/selectPublish', 'PublishedController::selectPublish', ["filter" => "auth"]); 
//Collet
$routes->post('/insertCollet', 'ColletController::insertPetCollet', ["filter" => "auth"]);//搜尋寵物收藏
$routes->get('/selectCollet', 'ColletController::selectPetCollet', ["filter" => "auth"]);//搜尋寵物收藏
$routes->post('/deleteCollet', 'ColletController::deletePetCollet', ["filter" => "auth"]);//刪除寵物收藏


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
