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
$routes->get('/', 'Home::index');
$routes->group('/', function($routes){
    $routes->get('login', 'Login::index');
    $routes->get('logout', 'Login::logout');
    $routes->get('registrasi', 'Login::signup');
    
});
$routes->get('/login', 'Login::index');
$routes->group('/', ['filter' => 'auth'],  function($routes){
    $routes->get('profile', 'Admin\Profile::index');
    $routes->post('profile/verifikasi', 'Admin\Profile::verifikasi');
    $routes->get('dashboard', 'Admin\Dashboard::index');
    $routes->get('aksesoris', 'Admin\Aksesoris::index');
    $routes->get('add_aksesoris', 'Admin\Aksesoris::insert');
    $routes->post('edit_aksesoris', 'Admin\Aksesoris::edit');
    $routes->get('delete_aksesoris/(:num)', 'Admin\Aksesoris::delete/$1');
    $routes->get('berita', 'Admin\Berita::index');
    $routes->get('berita/status/(:num)', 'Admin\Berita::status/$1');
    $routes->get('add_berita', 'Admin\Berita::insert');
    $routes->post('edit_berita', 'Admin\Berita::edit');
    $routes->get('delete_berita/(:num)', 'Admin\Berita::delete/$1');
    $routes->get('peternak', 'Admin\Peternak::index');
    $routes->get('peternak/changeStatus/(:num)', 'Admin\Peternak::changeStatus/$1');
    $routes->get('sapi', 'Admin\Sapi::index');
    $routes->post('sapi/tambah', 'Admin\Sapi::tambah');
    $routes->post('sapi/silsilah', 'Admin\Sapi::silsilah');
    $routes->post('sapi/edit', 'Admin\Sapi::edit');
    $routes->get('sapi/delete/(:num)', 'Admin\Sapi::delete/$1');
    $routes->get('pasangan', 'Admin\Pasangan::index');
    $routes->post('pasangan/tambah', 'Admin\Pasangan::insert');
    $routes->post('pasangan/edit', 'Admin\Pasangan::edit');
    $routes->get('pasangan/delete/(:num)', 'Admin\Pasangan::delete/$1');
    $routes->get('prestasi', 'Admin\Prestasi::index');
    $routes->post('prestasi/tambah', 'Admin\Prestasi::tambah');
    $routes->post('prestasi/edit', 'Admin\Prestasi::edit');
    $routes->get('prestasi/delete/(:num)', 'Admin\Prestasi::delete/$1');
    $routes->get('prestasi/lihat/(:num)', 'Admin\Prestasi::lihat/$1');
    $routes->get('pasar', 'Admin\Pasar::index');
    $routes->get('pasar/detail', 'Admin\Pasar::detail');
    $routes->get('penawaran', 'Admin\Penawaran::index');
    $routes->post('penawaran/tambah', 'Admin\Penawaran::tambah'); 
    $routes->post('penawaran/edit', 'Admin\Penawaran::update'); 
    $routes->get('penawaran/delete/(:num)', 'Admin\Penawaran::delete/$1'); 
    $routes->get('detail_penawaran/(:num)', 'Admin\DetailPenawaran::index/$1');
});
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
