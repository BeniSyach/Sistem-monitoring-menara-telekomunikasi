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

$routes->group('', ['filter' => 'login'], function ($routes) {

    $routes->get('/admin', 'Admin::index');

    $routes->get('/lokasi/index/(:any)', 'Lokasi::index/$1');
    $routes->get('/lokasi/tambah_menara/(:any)', 'Lokasi::tambah_menara/$1');
    $routes->get('/lokasi/ubah_menara/(:any)', 'Lokasi::ubah_menara/$1');
    $routes->get('/lokasi/hapus_data/(:any)', 'Lokasi::hapus_data/$1');
    $routes->get('/lokasi/simpan_menara', 'Lokasi::simpan_menara');
    $routes->get('/lokasi/update_data', 'Lokasi::update_data');

    $routes->get('/menu', 'Menu::index');
    $routes->get('/menu/tambah_menu', 'Menu::tambah_menu');
    $routes->get('/menu/simpan_menu', 'Menu::simpan_menu');
    $routes->get('/menu/ubah_menu', 'Menu::ubah_menu');
    $routes->get('/menu/update_data', 'Menu::update_data');
    $routes->get('/menu/hapus_menu', 'Menu::hapus_menu');

    $routes->get('/provider', 'Provider::index');
    $routes->get('/provider/edit', 'Provider::edit');
    $routes->get('/provider/edit_provider/(:any)', 'Provider::edit_provider/$1');

    $routes->get('/retribusi', 'Retribusi::index');
    $routes->get('/retribusi/tambah_retribusi', 'Retribusi::tambah_retribusi');
    $routes->get('/retribusi/simpan_data', 'Retribusi::simpan_data');
    $routes->get('/retribusi/edit_retribusi/(:any)', 'Retribusi::edit_retribusi/$1');
    $routes->get('/retribusi/edit_data', 'Retribusi::edit_data');
    $routes->get('/retribusi/hapus_retribusi/(:any)', 'Retribusi::hapus_retribusi/$1');

    $routes->get('/laporan', 'Laporan::index');

    $routes->get('/survey/index/(:any)', 'Survey::index/$1');
    $routes->get('/survey/edit_survey/(:any)', 'Survey::edit_survey/$1');
    $routes->get('/survey/edit_data', 'Survey::edit_data');
    $routes->get('/survey/tambah_survey/(:any)', 'Survey::tambah_survey/$1');
    $routes->get('/survey/simpan_data', 'Survey::simpan_data');
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
