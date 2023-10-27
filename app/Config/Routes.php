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
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
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
// Halaman Web
// $routes->get('/', 'Web::home');
// $routes->get('/home', 'Web::home');
// $routes->get('/lembaga', 'Web::lembaga');
// $routes->get('/klien', 'Web::klien');
// $routes->get('/sejarah', 'Web::sejarah');
// $routes->get('/program', 'Web::program');
// $routes->get('/lokasi', 'Web::lokasi');
// $routes->get('/team', 'Web::team');
// $routes->get('/contact', 'Web::contact');
// $routes->get('/galeri', 'Web::galeri');
// $routes->get('/konten', 'Web::konten');
// $routes->get('/about', 'Web::about');
// $routes->get('/view/(:num)', 'Web::view/$1');

// Login dan Registrasi
$routes->get('/', 'Login::index');
$routes->get('/registrasi', 'Login::registrasi');
$routes->post('/save', 'Login::save');
$routes->post('/login/auth', 'Login::auth');
$routes->get('/logout', 'Login::logout');


// Halaman Dashboard dan User
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('/user', 'Dashboard::user', ['filter' => 'auth']);
$routes->get('/create', 'Dashboard::create', ['filter' => 'auth']);
$routes->get('/create/divisi/(:num)', 'Dashboard::t_divisi/$1', ['filter' => 'auth']);
$routes->post('/create/save', 'Dashboard::save', ['filter' => 'auth']);
$routes->delete('/user/(:num)', 'Dashboard::delete/$1', ['filter' => 'auth']);
$routes->get('/edit/divisi/(:num)', 'Dashboard::t_divisi/$1', ['filter' => 'auth']);
$routes->get('/edit/(:num)', 'Dashboard::edit/$1', ['filter' => 'auth']);
$routes->post('/edit/update/(:num)', 'Dashboard::update/$1', ['filter' => 'auth']);

// Belanja
$routes->get('/belanja', 'Belanja::index', ['filter' => 'auth']);
$routes->add('/belanja/create', 'Belanja::create', ['filter' => 'auth']);
$routes->get('/belanja/read/(:any)', 'Belanja::read/$1', ['filter' => 'auth']);
$routes->add('/belanja/update/(:any)', 'Belanja::update/$1', ['filter' => 'auth']);
$routes->get('/belanja/delete/(:any)', 'Belanja::delete/$1', ['filter' => 'auth']);
$routes->post('/belanja/readKegiatan', 'Belanja::readKegiatan', ['filter' => 'auth']);
$routes->post('/belanja/readRincian', 'Belanja::readRincian', ['filter' => 'auth']);
$routes->post('/belanja/readPajak', 'Belanja::readPajak', ['filter' => 'auth']);

// Pendapatan
$routes->get('/pendapatan', 'Pendapatan::index', ['filter' => 'auth']);
$routes->add('/pendapatan/create', 'Pendapatan::create', ['filter' => 'auth']);
$routes->get('/pendapatan/read/(:any)', 'Pendapatan::read/$1', ['filter' => 'auth']);
$routes->add('/pendapatan/update/(:any)', 'Pendapatan::update/$1', ['filter' => 'auth']);
$routes->get('/pendapatan/delete/(:any)', 'Pendapatan::delete/$1', ['filter' => 'auth']);
$routes->post('/pendapatan/readKegiatan', 'Pendapatan::readKegiatan', ['filter' => 'auth']);
$routes->post('/pendapatan/readRincian', 'Pendapatan::readRincian', ['filter' => 'auth']);
$routes->post('/pendapatan/readPajak', 'Pendapatan::readPajak', ['filter' => 'auth']);

//  Kategori
$routes->get('/kategori_admin', 'Kategori::index', ['filter' => 'auth']);
$routes->post('/tambahKategori/save', 'Kategori::save', ['filter' => 'auth']);
$routes->get('/kategori_edit/(:num)', 'Kategori::ubahKategori/$1', ['filter' => 'auth']);
$routes->post('/ubahKategori/update/(:num)', 'Kategori::update/$1', ['filter' => 'auth']);
$routes->delete('/kategori/(:num)', 'Kategori::delete/$1', ['filter' => 'auth']);

// Halaman Utama
$routes->get('/home_admin', 'Utama::index', ['filter' => 'auth']);
$routes->post('/tambah/save', 'Utama::save', ['filter' => 'auth']);

// Lembaga
$routes->get('/lembaga_admin', 'Lembaga::index', ['filter' => 'auth']);
$routes->post('/simpan/save', 'Lembaga::save', ['filter' => 'auth']);

// Client
$routes->get('/klien_admin', 'Klien::index', ['filter' => 'auth']);
$routes->post('/tersimpan/save', 'Klien::save', ['filter' => 'auth']);
$routes->delete('/klien/(:num)', 'Klien::delete/$1', ['filter' => 'auth']);
$routes->get('/ubah/(:num)', 'Klien::ubah/$1', ['filter' => 'auth']);
$routes->post('/ubah/update/(:num)', 'Klien::update/$1', ['filter' => 'auth']);

// Galeri
$routes->get('/galeri_admin', 'Galeri::index', ['filter' => 'auth']);
$routes->post('/disimpan/save', 'Galeri::save', ['filter' => 'auth']);
$routes->delete('/galeri/(:num)', 'Galeri::delete/$1', ['filter' => 'auth']);
$routes->get('/mengubah/(:num)', 'Galeri::mengubah/$1', ['filter' => 'auth']);
$routes->post('/mengubah/update/(:num)', 'Galeri::update/$1', ['filter' => 'auth']);


// Team
$routes->get('/team_admin', 'Team::index', ['filter' => 'auth']);
$routes->post('/simpankan/save', 'Team::save', ['filter' => 'auth']);
$routes->delete('/team/(:num)', 'Team::delete/$1', ['filter' => 'auth']);
$routes->get('/merubah/(:num)', 'Team::merubah/$1', ['filter' => 'auth']);
$routes->post('/merubah/update/(:num)', 'Team::update/$1', ['filter' => 'auth']);

//Setting
$routes->get('/setting_admin', 'Setting::index', ['filter' => 'auth']);
$routes->post('/tambahSetting/save', 'Setting::save', ['filter' => 'auth']);

// Konten
$routes->get('/konten_admin', 'Konten::index', ['filter' => 'auth']);
$routes->post('/tambahKonten/save', 'Konten::save', ['filter' => 'auth']);
$routes->get('/konten_admin/kategori/(:num)', 'Konten::t_kategori/$1', ['filter' => 'auth']);
$routes->get('/konten_edit/(:num)', 'Konten::ubahKonten/$1', ['filter' => 'auth']);
$routes->post('/ubahKonten/update/(:num)', 'Konten::update/$1', ['filter' => 'auth']);
$routes->delete('/konten/(:num)', 'Konten::delete/$1', ['filter' => 'auth']);

//Contact
$routes->get('/contact_admin', 'Contact::index', ['filter' => 'auth']);
$routes->post('/ditambahkan/save', 'Contact::save', ['filter' => 'auth']);


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
