<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
|--------------------------------------------------------------------------|
| FRONTEND ROUTES
|--------------------------------------------------------------------------|
*/

// Halaman utama
$routes->get('/', 'Home::index');

// Auth Member
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::loginSubmit');
$routes->get('register', 'Auth::register');
$routes->post('register', 'Auth::registerSubmit');
$routes->get('logout', 'Auth::logout');

// Auth via /auth/*
$routes->get('auth/login', 'Auth::login');
$routes->post('auth/login', 'Auth::loginSubmit');
$routes->get('auth/register', 'Auth::register');
$routes->post('auth/register', 'Auth::registerSubmit');
$routes->get('auth/logout', 'Auth::logout');

// Google OAuth
$routes->get('auth/google', 'Auth::googleLogin');
$routes->get('auth/googleCallback', 'Auth::googleCallback');

// Wisata
$routes->get('wisata', 'Wisata::index');
$routes->get('wisata/search', 'Wisata::search');
$routes->get('wisata/(:segment)', 'Wisata::detail/$1');

// Homestay
$routes->get('homestay', 'Homestay::index');
$routes->get('homestay/search', 'Homestay::search');
$routes->get('homestay/(:segment)', 'Homestay::detail/$1');

// Galeri & Video
$routes->get('gallery', 'Gallery::index');
$routes->get('video', 'Video::index');

// Berita
$routes->get('berita', 'Berita::index');
$routes->get('berita/(:segment)', 'Berita::detail/$1');

// Riwayat Transaksi Member
$routes->get('/riwayat', 'Checkout::riwayat');

/*
|--------------------------------------------------------------------------|
| MEMBER ROUTES (Checkout controller)
|--------------------------------------------------------------------------|
*/
$routes->group('member', function ($routes) {
    $routes->get('/', 'Checkout::dashboard');
    $routes->get('pesan/wisata/(:num)', 'Checkout::pesanWisata/$1');
    $routes->get('pesan/homestay/(:num)', 'Checkout::pesanHomestay/$1');
    $routes->post('simpan-pesanan', 'Checkout::simpanPesanan');
    $routes->post('simpan-pesanan-homestay', 'Checkout::simpanPesananHomestay');
    $routes->get('pembayaran/(:num)', 'Checkout::pembayaran/$1');
    $routes->get('pembayaran_homestay/(:num)', 'Checkout::pembayaran_homestay/$1');
    $routes->post('simpan_pembayaran_homestay', 'Checkout::simpanPembayaranHomestay');
    $routes->post('simpan-pembayaran', 'Checkout::simpanPembayaran');
    $routes->get('riwayat', 'Checkout::riwayat');
    $routes->get('logout', 'Auth::logout');
});

/*
|--------------------------------------------------------------------------|
| CHECKOUT (Umum)
|--------------------------------------------------------------------------|
*/
$routes->get('checkout', 'Checkout::index');
$routes->get('checkout/konfirmasi', 'Checkout::konfirmasi');

/*
|--------------------------------------------------------------------------|
| ADMIN ROUTES
|--------------------------------------------------------------------------|
*/
$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
    // Auth Admin
    $routes->get('login', 'Auth::login');
    $routes->post('login', 'Auth::loginSubmit');
    $routes->get('logout', 'Auth::logout');

    // Dashboard
    $routes->get('/', 'Dashboard::index');

    // Paket Wisata (CRUD)
    $routes->get('paketwisata', 'PaketWisata::index');
    $routes->get('paketwisata/create', 'PaketWisata::create');
    $routes->post('paketwisata/store', 'PaketWisata::store');
    $routes->get('paketwisata/edit/(:num)', 'PaketWisata::edit/$1');
    $routes->post('paketwisata/update/(:num)', 'PaketWisata::update/$1');
    $routes->get('paketwisata/delete/(:num)', 'PaketWisata::delete/$1');

    // Homestay (CRUD Lengkap)
    $routes->get('homestay', 'Homestay::index');
    $routes->get('homestay/create', 'Homestay::create');
    $routes->post('homestay/store', 'Homestay::store');
    $routes->get('homestay/edit/(:num)', 'Homestay::edit/$1');
    $routes->post('homestay/update/(:num)', 'Homestay::update/$1');
    $routes->get('homestay/delete/(:num)', 'Homestay::delete/$1');

    // Gallery (CRUD)
    $routes->get('gallery', 'Gallery::index');
    $routes->get('gallery/create', 'Gallery::create');
    $routes->post('gallery/store', 'Gallery::store');
    $routes->get('gallery/edit/(:num)', 'Gallery::edit/$1');
    $routes->post('gallery/update/(:num)', 'Gallery::update/$1');
    $routes->get('gallery/delete/(:num)', 'Gallery::delete/$1');

    // Video (CRUD)
    $routes->get('video', 'Video::index');
    $routes->get('video/create', 'Video::create');
    $routes->post('video/store', 'Video::store');
    $routes->get('video/edit/(:num)', 'Video::edit/$1');
    $routes->post('video/update/(:num)', 'Video::update/$1');
    $routes->get('video/delete/(:num)', 'Video::delete/$1');

    // Berita (CRUD)
    $routes->get('berita', 'Berita::index');
    $routes->get('berita/create', 'Berita::create');
    $routes->post('berita/store', 'Berita::store');
    $routes->get('berita/edit/(:num)', 'Berita::edit/$1');
    $routes->post('berita/update/(:num)', 'Berita::update/$1');
    $routes->get('berita/delete/(:num)', 'Berita::delete/$1');

    // Member
    $routes->get('member', 'Member::index');
    $routes->get('member/detail/(:num)', 'Member::detail/$1');

    // Pemesanan Wisata
    $routes->get('pemesanan', 'Pemesanan::index');
    $routes->get('pemesanan/detail/(:num)', 'Pemesanan::detail/$1');
    $routes->get('pemesanan/konfirmasi/(:num)', 'Pemesanan::konfirmasi/$1');

    // Pembayaran Wisata
    $routes->get('pembayaran', 'Pembayaran::index');
    $routes->get('pembayaran/detail/(:num)', 'Pembayaran::detail/$1');
    $routes->get('pembayaran/konfirmasi/(:num)', 'Pembayaran::konfirmasi/$1');

    // Pemesanan Homestay
    $routes->get('pemesanan_homestay', 'PemesananHomestay::index');
    $routes->get('pemesanan_homestay/detail/(:num)', 'PemesananHomestay::detail/$1');
    $routes->get('pemesanan_homestay/konfirmasi/(:num)', 'PemesananHomestay::konfirmasi/$1');

    // Pembayaran Homestay
    $routes->get('pembayaranhomestay', 'PembayaranHomestay::index');
    $routes->get('pembayaranhomestay/detail/(:num)', 'PembayaranHomestay::detail/$1');
    $routes->get('pembayaranhomestay/konfirmasi/(:num)', 'PembayaranHomestay::konfirmasi/$1');

    // Laporan
    $routes->get('laporan', 'Laporan::index');
    $routes->get('laporan/pdf', 'Laporan::exportPdf');
    $routes->get('laporan/excel', 'Laporan::exportExcel');
    $routes->get('laporanpdf', 'Laporan::pdf');
});
