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
$routes->get('/', 'Home::index', ['filter' => 'role:admin,guru']);

$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/(:segment)', 'Admin::index/$1', ['filter' => 'role:admin']);

$routes->get('/tahun-ajaran', 'TahunAjaran::index', ['filter' => 'role:admin']);

$routes->get('/pilihan', 'Pilihan::index', ['filter' => 'role:admin']);

$routes->get('/matapelajaran', 'Matapelajaran::index', ['filter' => 'role:admin']);

$routes->get('/kelas', 'Kelas::index', ['filter' => 'role:admin']);
$routes->get('/daftar-siswa/(:segment)', 'Kelas::daftarSiswaKelas/$1', ['filter' => 'role:admin']);

$routes->get('/jurusan', 'Jurusan::index', ['filter' => 'role:admin']);

$routes->get('/siswa', 'Siswa::index', ['filter' => 'role:admin']);
$routes->get('/siswa/edit/(:segment)', 'Siswa::edit/$1', ['filter' => 'role:admin']);
$routes->get('/siswa/edit/penyakit/(:segment)', 'Penyakit::index/$1', ['filter' => 'role:admin']);
$routes->get('/siswa/edit/prestasi/(:segment)', 'Prestasi::index/$1', ['filter' => 'role:admin']);
$routes->get('/siswa/edit/beasiswa/(:segment)', 'Beasiswa::index/$1', ['filter' => 'role:admin']);
$routes->get('/siswa/edit/kehadiran/(:segment)', 'Kehadiran::index/$1', ['filter' => 'role:admin']);

$routes->get('/catatan', 'Catatan::index', ['filter' => 'role:admin']);

$routes->get('/nilai', 'Nilai::index', ['filter' => 'role:admin,guru']);
$routes->get('/nilai/(:segment)/(:segment)', 'Nilai::nilai/$1/$2', ['filter' => 'role:admin,guru']);
$routes->get('/template/(:segment)/(:segment)', 'Nilai::template/$1/$2', ['filter' => 'role:admin,guru']);

$routes->get('/rapor', 'Rapor::index', ['filter' => 'role:admin']);
$routes->get('/rapor/(:segment)', 'Rapor::rapor/$1', ['filter' => 'role:admin']);
$routes->get('/rapor/nilai/(:segment)', 'Rapor::nilai/$1', ['filter' => 'role:admin']);

$routes->get('/laporan', 'Laporan::index', ['filter' => 'role:admin']);
$routes->get('/laporan/siswa-details/(:segment)', 'Laporan::siswaDetails/$1', ['filter' => 'role:admin']);
$routes->get('/laporan/daftar-siswa-sekolah', 'Laporan::daftarSiswaSekolah', ['filter' => 'role:admin']);

$routes->get('/profile-sekolah', 'Profile::index', ['filter' => 'role:admin']);

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
