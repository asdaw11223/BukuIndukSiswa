<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Siswa');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('/tahun-ajaran', 'TahunAjaran::index');

$routes->get('/pilihan', 'Pilihan::index');

$routes->get('/matapelajaran', 'Matapelajaran::index');

$routes->get('/kelas', 'Kelas::index');
$routes->get('/daftar-siswa/(:segment)', 'Kelas::daftarSiswaKelas/$1');

$routes->get('/jurusan', 'Jurusan::index');

$routes->get('/siswa', 'Siswa::index');
$routes->get('/siswa/edit/(:segment)', 'Siswa::edit/$1');
$routes->get('/siswa/edit/penyakit/(:segment)', 'Penyakit::index/$1');
$routes->get('/siswa/edit/prestasi/(:segment)', 'Prestasi::index/$1');
$routes->get('/siswa/edit/beasiswa/(:segment)', 'Beasiswa::index/$1');
$routes->get('/siswa/edit/kehadiran/(:segment)', 'Kehadiran::index/$1');
// $routes->get('/siswa/tambah-siswa', 'Siswa::create');

$routes->get('/catatan', 'Catatan::index');

$routes->get('/nilai', 'Nilai::index');
$routes->get('/rapor', 'Rapor::index');

$routes->get('/laporan', 'Laporan::index');

$routes->get('/profile-sekolah', 'Sekolah::index');

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
