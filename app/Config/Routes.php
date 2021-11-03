<?php

namespace Config;

use CodeIgniter\Config\Services;

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
$routes->get('/', 'Home::index');
$routes->get('/hello', 'SelamatDatang::hal_awal');
$routes->post('/login', 'Login::cekLogin');
$routes->get('/daftar-member', 'SelamatDatang::daftar_member');
$routes->get('/beranda', 'SelamatDatang::hal_beranda', ['filter' => 'auth']);

$routes->get('/login', 'SelamatDatang::beranda_login', ['filter' => 'autoin']);
$routes->get('/logout', function(){
    Services::session()->destroy();
    return redirect()->to('/login');
});

$routes->get('/pengguna-list', 'PenggunaController::index', ['filter' => 'auth']);
$routes->get('/pengguna', 'PenggunaController::form', ['filter' => 'auth']);
$routes->get('/pengguna/(:num)', 'PenggunaController::edit/$1', ['filter' => 'auth']);
$routes->post('/pengguna', 'PenggunaController::simpan', ['filter' => 'auth']);
$routes->patch('/pengguna', 'PenggunaController::patch', ['filter' => 'auth']);
$routes->delete('/pengguna', 'PenggunaController::delete', ['filter' => 'auth']);
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
