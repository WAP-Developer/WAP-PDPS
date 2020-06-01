<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Login::employe');
$routes->post('/', 'Login::employeprocess');
$routes->get('/cp-admin/', 'Login::admin');
$routes->post('/cp-admin/', 'Login::adminprocess');

$routes->get('/dashboard/', 'Main::index');
$routes->get('/dashboard-content/', 'Main::dashboard');


// ===================================
// Penduduk
// ===================================
$routes->get('/penduduk/', 'Main::penduduk');
$routes->get('/add-penduduk/', 'Main::addPenduduk');
$routes->get('/edit-penduduk/(:num)', 'Main::editPenduduk/$1');
$routes->post('/add-penduduk/', 'Main::addPendudukProcess');
$routes->post('/update-penduduk/', 'Main::updatePenduduk');
$routes->post('/delete-penduduk/', 'Main::deletePendudukProcess');
$routes->post('/add-anggota/', 'Main::addAnggota');
$routes->post('/update-anggota/', 'Main::updateAnggotaProccess');
$routes->post('/fetch-edit-anggota/', 'Main::updateAnggota');
$routes->post('/delete-anggota/', 'Main::deleteAnggota');
$routes->post('/fetchnokk/', 'Main::fetchNoKK');
$routes->post('/fetchanggota/', 'Main::fetchAnggota');

// Karyawan
// ====================================
$routes->get('/employe/', 'Main::employe');
$routes->post('/employe/', 'Main::addEmploye');
$routes->post('/reset-employe/', 'Main::resetEmploye');
$routes->post('/delete-employe/', 'Main::deleteEmploye');

// Surat
// =====================================
$routes->post('/get-data-bynik/', 'Main::getDataNik');
$routes->get('/surat-perusahaan/', 'Main::suratPerusahaan');
$routes->get('/surat-usaha/', 'Main::suratUsaha');
$routes->get('/surat-warga/', 'Main::suratWarga');
$routes->get('/surat-kematian/', 'Main::suratKematian');
$routes->get('/surat-sktm/', 'Main::suratSktm');

// Report
// =====================================
$routes->get('/report-perusahaan/', 'Main::domisiliPerusahaan');
$routes->get('/report-usaha/', 'Main::domisiliUsaha');
$routes->get('/report-warga/', 'Main::domisiliWarga');
$routes->get('/report-kematian/', 'Main::kematian');
$routes->get('/report-sktm/', 'Main::sktm');
$routes->get('/get-domisili-perusahaan/', 'Main::getDomisiliPerusahaan');
$routes->get('/get-domisili-usaha/', 'Main::getDomisiliUsaha');
$routes->get('/get-domisili-warga/', 'Main::getDomisiliWarga');
$routes->get('/get-kematian/', 'Main::getKematian');
$routes->get('/get-sktm/', 'Main::getSktm');
$routes->post('/get-domisili-perusahaan/', 'Main::getDomisiliPerusahaan');
$routes->post('/get-domisili-usaha/', 'Main::getDomisiliUsaha');
$routes->post('/get-domisili-warga/', 'Main::getDomisiliWarga');
$routes->post('/get-kematian/', 'Main::getKematian');
$routes->post('/get-sktm/', 'Main::getSktm');


// Account
$routes->get('/logout/', 'Main::logout');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
