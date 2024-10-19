<?php

namespace Config;


// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

$routes->get('/', 'HomeController::index');
$routes->get('/coba', 'HomeController::coba');
$routes->get('/sambutan', 'PageViewController::readsambutan');
$routes->get('/berita', 'PageViewController::index');
$routes->get('/pengumuman', 'PageViewController::pengumuman');
$routes->get('/agenda', 'PageViewController::agenda');
$routes->get('/karir', 'PageViewController::karir');
$routes->get('/download/(:any)', 'PageViewController::byJenis/$1');
$routes->get('/mahasiswa/(:segment)', 'PageViewController::byJenisMahasiswa/$1');
$routes->get('/pages/(:segment)', 'PageViewController::read/$1');
$routes->get('/pengabdian', 'PageViewController::pengabdian');
$routes->get('/penelitian', 'PageViewController::penelitian');
$routes->get('/publikasi', 'PageViewController::publikasi');

// $routes->get('/kontak', 'PageViewController::kontak');

$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'role:Admin,User']);
$routes->get('/dashboard/profile', 'DashboardController::profile', ['filter' => 'role:Admin,User']);
$routes->post('/dashboard/profile/update', 'DashboardController::update_profile', ['filter' => 'role:Admin,User']);
$routes->post('/dashboard/profile/updatepas', 'DashboardController::update_password', ['filter' => 'role:Admin,User']);
$routes->get('/dashboard/konfigweb', 'DashboardController::konfigweb', ['filter' => 'role:Admin,User']);
$routes->post('/dashboard/konfigweb/update', 'DashboardController::update_konfigweb', ['filter' => 'role:Admin,User']);
$routes->get('/dashboard/sambutan', 'DashboardController::konfigsambutan', ['filter' => 'role:Admin,User']);
$routes->post('/dashboard/konfigsambutan/update', 'DashboardController::update_konfigsambutan', ['filter' => 'role:Admin,User']);

$routes->get('/dashboard/user', 'UserController::index', ['filter' => 'role:Admin']);
$routes->get('/dashboard/user/index', 'UserController::index', ['filter' => 'role:Admin']);
$routes->get('/dashboard/user/detail/(:segment)', 'UserController::detail/$1', ['filter' => 'role:Admin']);
$routes->get('/dashboard/user/create', 'UserController::create', ['filter' => 'role:Admin']);
$routes->post('/dashboard/user/store', 'UserController::store', ['filter' => 'role:Admin']);
$routes->get('/dashboard/user/edit/(:num)', 'UserController::edit/$1', ['filter' => 'role:Admin']);
$routes->post('/dashboard/user/update/(:num)', 'UserController::update/$1', ['filter' => 'role:Admin']);
$routes->delete('/dashboard/user/(:num)', 'UserController::delete/$1', ['filter' => 'role:Admin']);

$routes->get('/dashboard/dokumen', 'DokumenController::index', ['filter' => 'role:Admin,User']);
$routes->get('/dashboard/dokumen/index', 'DokumenController::index', ['filter' => 'role:Admin,User']);
$routes->get('/dashboard/dokumen/create', 'DokumenController::create', ['filter' => 'role:Admin,User']);
$routes->post('/dashboard/dokumen/store', 'DokumenController::store', ['filter' => 'role:Admin,User']);
$routes->get('/dashboard/dokumen/edit/(:num)', 'DokumenController::edit/$1', ['filter' => 'role:Admin,User']);
$routes->post('/dashboard/dokumen/update/(:num)', 'DokumenController::update/$1', ['filter' => 'role:Admin,User']);
$routes->get('/dashboard/dokumen/del/(:num)', 'DokumenController::delete/$1');
$routes->delete('/dashboard/dokumen/(:num)', 'DokumenController::delete/$1', ['filter' => 'role:Admin,User']);

$routes->get('/dashboard/artikel', 'ArtikelController::index', ['filter' => 'role:Admin,User']);
$routes->get('/dashboard/artikel/index', 'ArtikelController::index', ['filter' => 'role:Admin,User']);
$routes->get('/dashboard/artikel/create', 'ArtikelController::create', ['filter' => 'role:Admin,User']);
$routes->post('/dashboard/artikel/store', 'ArtikelController::store', ['filter' => 'role:Admin,User']);
$routes->get('/dashboard/artikel/edit/(:num)', 'ArtikelController::edit/$1', ['filter' => 'role:Admin,User']);
$routes->post('/dashboard/artikel/update/(:num)', 'ArtikelController::update/$1', ['filter' => 'role:Admin,User']);
$routes->delete('/dashboard/artikel/(:num)', 'ArtikelController::delete/$1', ['filter' => 'role:Admin,User']);

$routes->get('/dashboard/pengabdian', 'PengabdianController::index', ['filter' => 'role:Admin,User']);
$routes->get('/dashboard/pengabdian/index', 'PengabdianController::index', ['filter' => 'role:Admin,User']);
$routes->get('/dashboard/pengabdian/create', 'PengabdianController::create', ['filter' => 'role:Admin,User']);
$routes->post('/dashboard/pengabdian/store', 'PengabdianController::store', ['filter' => 'role:Admin,User']);
$routes->get('/dashboard/pengabdian/edit/(:num)', 'PengabdianController::edit/$1', ['filter' => 'role:Admin,User']);
$routes->post('/dashboard/pengabdian/update/(:num)', 'PengabdianController::update/$1', ['filter' => 'role:Admin,User']);
$routes->delete('/dashboard/pengabdian/(:num)', 'PengabdianController::delete/$1', ['filter' => 'role:Admin,User']);

$routes->get('/dashboard/penelitian', 'PenelitianController::index', ['filter' => 'role:Admin,User']);
$routes->get('/dashboard/penelitian/index', 'PenelitianController::index', ['filter' => 'role:Admin,User']);
$routes->get('/dashboard/penelitian/create', 'PenelitianController::create', ['filter' => 'role:Admin,User']);
$routes->post('/dashboard/penelitian/store', 'PenelitianController::store', ['filter' => 'role:Admin,User']);
$routes->get('/dashboard/penelitian/edit/(:num)', 'PenelitianController::edit/$1', ['filter' => 'role:Admin,User']);
$routes->post('/dashboard/penelitian/update/(:num)', 'PenelitianController::update/$1', ['filter' => 'role:Admin,User']);
$routes->delete('/dashboard/penelitian/(:num)', 'PenelitianController::delete/$1', ['filter' => 'role:Admin,User']);

$routes->get('/dashboard/publikasi', 'PublikasiController::index', ['filter' => 'role:Admin,User']);
$routes->get('/dashboard/publikasi/index', 'PublikasiController::index', ['filter' => 'role:Admin,User']);
$routes->get('/dashboard/publikasi/create', 'PublikasiController::create', ['filter' => 'role:Admin,User']);
$routes->post('/dashboard/publikasi/store', 'PublikasiController::store', ['filter' => 'role:Admin,User']);
$routes->get('/dashboard/publikasi/edit/(:num)', 'PublikasiController::edit/$1', ['filter' => 'role:Admin,User']);
$routes->post('/dashboard/publikasi/update/(:num)', 'PublikasiController::update/$1', ['filter' => 'role:Admin,User']);
$routes->delete('/dashboard/publikasi/(:num)', 'PublikasiController::delete/$1', ['filter' => 'role:Admin,User']);

$routes->get('/dashboard/slide', 'SlideController::index', ['filter' => 'role:Admin']);
$routes->get('/dashboard/slide/index', 'SlideController::index', ['filter' => 'role:Admin']);
$routes->get('/dashboard/slide/edit/(:num)', 'SlideController::edit/$1', ['filter' => 'role:Admin']);
$routes->post('/dashboard/slide/update/(:num)', 'SlideController::update/$1', ['filter' => 'role:Admin']);
$routes->get('/dashboard/layanan', 'LayananController::index', ['filter' => 'role:Admin']);
$routes->get('/dashboard/layanan/index', 'LayananController::index', ['filter' => 'role:Admin']);
$routes->get('/dashboard/layanan/create', 'LayananController::create', ['filter' => 'role:Admin']);
$routes->post('/dashboard/layanan/store', 'LayananController::store', ['filter' => 'role:Admin']);
$routes->get('/dashboard/layanan/edit/(:num)', 'LayananController::edit/$1', ['filter' => 'role:Admin']);
$routes->post('/dashboard/layanan/update/(:num)', 'LayananController::update/$1', ['filter' => 'role:Admin']);
$routes->delete('/dashboard/layanan/(:num)', 'LayananController::delete/$1', ['filter' => 'role:Admin']);
$routes->get('/dashboard/pimpinan', 'PimpinanController::index', ['filter' => 'role:Admin']);
$routes->get('/dashboard/pimpinan/index', 'PimpinanController::index', ['filter' => 'role:Admin']);
$routes->get('/dashboard/pimpinan/edit/(:num)', 'PimpinanController::edit/$1', ['filter' => 'role:Admin']);
$routes->post('/dashboard/pimpinan/update/(:num)', 'PimpinanController::update/$1', ['filter' => 'role:Admin']);

$routes->get('/dashboard/galeri', 'GaleriController::index', ['filter' => 'role:Admin']);
$routes->get('/dashboard/galeri/index', 'GaleriController::index', ['filter' => 'role:Admin']);
$routes->get('/dashboard/galeri/create', 'GaleriController::create', ['filter' => 'role:Admin']);
$routes->post('/dashboard/galeri/store', 'GaleriController::store', ['filter' => 'role:Admin']);
$routes->get('/dashboard/galeri/edit/(:num)', 'GaleriController::edit/$1', ['filter' => 'role:Admin']);
$routes->post('/dashboard/galeri/update/(:num)', 'GaleriController::update/$1', ['filter' => 'role:Admin']);
$routes->delete('/dashboard/galeri/(:num)', 'GaleriController::delete/$1', ['filter' => 'role:Admin']);

$routes->get('/dashboard/jenis', 'JenisController::index', ['filter' => 'role:Admin']);
$routes->get('/dashboard/jenis/index', 'JenisController::index', ['filter' => 'role:Admin']);
$routes->get('/dashboard/jenis/create', 'JenisController::create', ['filter' => 'role:Admin']);
$routes->post('/dashboard/jenis/store', 'JenisController::store', ['filter' => 'role:Admin']);
$routes->get('/dashboard/jenis/edit/(:num)', 'JenisController::edit/$1', ['filter' => 'role:Admin']);
$routes->post('/dashboard/jenis/update/(:num)', 'JenisController::update/$1', ['filter' => 'role:Admin']);
$routes->delete('/dashboard/jenis/(:num)', 'JenisController::delete/$1', ['filter' => 'role:Admin']);

$routes->get('/dashboard/jenisdokumen', 'JenisDokumenController::index', ['filter' => 'role:Admin']);
$routes->get('/dashboard/jenisdokumen/index', 'JenisDokumenController::index', ['filter' => 'role:Admin']);
$routes->get('/dashboard/jenisdokumen/create', 'JenisDokumenController::create', ['filter' => 'role:Admin']);
$routes->post('/dashboard/jenisdokumen/store', 'JenisDokumenController::store', ['filter' => 'role:Admin']);
$routes->get('/dashboard/jenisdokumen/edit/(:num)', 'JenisDokumenController::edit/$1', ['filter' => 'role:Admin']);
$routes->post('/dashboard/jenisdokumen/update/(:num)', 'JenisDokumenController::update/$1', ['filter' => 'role:Admin']);
$routes->delete('/dashboard/jenisdokumen/(:num)', 'JenisDokumenController::delete/$1', ['filter' => 'role:Admin']);

$routes->get('/dashboard/jenispkm', 'JenisPkmController::index', ['filter' => 'role:Admin']);
$routes->get('/dashboard/jenispkm/index', 'JenisPkmController::index', ['filter' => 'role:Admin']);
$routes->get('/dashboard/jenispkm/create', 'JenisPkmController::create', ['filter' => 'role:Admin']);
$routes->post('/dashboard/jenispkm/store', 'JenisPkmController::store', ['filter' => 'role:Admin']);
$routes->get('/dashboard/jenispkm/edit/(:num)', 'JenisPkmController::edit/$1', ['filter' => 'role:Admin']);
$routes->post('/dashboard/jenispkm/update/(:num)', 'JenisPkmController::update/$1', ['filter' => 'role:Admin']);
$routes->delete('/dashboard/jenispkm/(:num)', 'JenisPkmController::delete/$1', ['filter' => 'role:Admin']);

$routes->get('/dashboard/jenispenelitian', 'JenisPenelitianController::index', ['filter' => 'role:Admin']);
$routes->get('/dashboard/jenispenelitian/index', 'JenisPenelitianController::index', ['filter' => 'role:Admin']);
$routes->get('/dashboard/jenispenelitian/create', 'JenisPenelitianController::create', ['filter' => 'role:Admin']);
$routes->post('/dashboard/jenispenelitian/store', 'JenisPenelitianController::store', ['filter' => 'role:Admin']);
$routes->get('/dashboard/jenispenelitian/edit/(:num)', 'JenisPenelitianController::edit/$1', ['filter' => 'role:Admin']);
$routes->post('/dashboard/jenispenelitian/update/(:num)', 'JenisPenelitianController::update/$1', ['filter' => 'role:Admin']);
$routes->delete('/dashboard/jenispenelitian/(:num)', 'JenisPenelitianController::delete/$1', ['filter' => 'role:Admin']);

$routes->get('/dashboard/jenispublikasi', 'JenisPublikasiController::index', ['filter' => 'role:Admin']);
$routes->get('/dashboard/jenispublikasi/index', 'JenisPublikasiController::index', ['filter' => 'role:Admin']);
$routes->get('/dashboard/jenispublikasi/create', 'JenisPublikasiController::create', ['filter' => 'role:Admin']);
$routes->post('/dashboard/jenispublikasi/store', 'JenisPublikasiController::store', ['filter' => 'role:Admin']);
$routes->get('/dashboard/jenispublikasi/edit/(:num)', 'JenisPublikasiController::edit/$1', ['filter' => 'role:Admin']);
$routes->post('/dashboard/jenispublikasi/update/(:num)', 'JenisPublikasiController::update/$1', ['filter' => 'role:Admin']);
$routes->delete('/dashboard/jenispublikasi/(:num)', 'JenisPublikasiController::delete/$1', ['filter' => 'role:Admin']);

$routes->get('/dashboard/prodi', 'ProdiController::index', ['filter' => 'role:Admin']);
$routes->get('/dashboard/prodi/index', 'ProdiController::index', ['filter' => 'role:Admin']);
$routes->get('/dashboard/prodi/create', 'ProdiController::create', ['filter' => 'role:Admin']);
$routes->post('/dashboard/prodi/store', 'ProdiController::store', ['filter' => 'role:Admin']);
$routes->get('/dashboard/prodi/edit/(:num)', 'ProdiController::edit/$1', ['filter' => 'role:Admin']);
$routes->post('/dashboard/prodi/update/(:num)', 'ProdiController::update/$1', ['filter' => 'role:Admin']);
$routes->delete('/dashboard/prodi/(:num)', 'ProdiController::delete/$1', ['filter' => 'role:Admin']);



if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
