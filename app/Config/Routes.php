<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('render_auth');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::render_auth');
$routes->post('/', 'Auth::login');
$routes->get('/logout', 'Auth::logout', ['as' => 'logout']);
$routes->get('tes', 'Layanan::tes');
$routes->group('master', ['filter' => 'authentication'], function($route){
	$route->get('tes', 'Admin::tes');
	$route->get('', 'Admin::index', ['as' => 'dashboard']);

	$route->get('user', 'Admin::render_user', ['as'=>'user']);
	$route->get('user/tambah-user', 'Admin::render_form_user', ['as'=>'tambah-user']);
	$route->post('user/tambah-user', 'Admin::insert_user');
	$route->get('user/edit-user/(:num)', 'Admin::render_form_user/$1', ['as'=>'edit-user']);
	$route->put('user/edit-user/(:num)', 'Admin::update_user/$1');
	$route->delete('user/delete-user/(:num)', 'Admin::delete_user/$1', ['as'=>'delete-user']);

	$route->get('outlet', 'Admin::render_outlet', ['as'=>'outlet']);
	$route->get('outlet/tambah-outlet', 'Admin::render_form_outlet', ['as'=>'tambah-outlet']);
	$route->post('outlet/tambah-outlet/', 'Admin::insert_outlet');
	$route->get('outlet/edit-outlet/(:num)', 'Admin::render_form_outlet/$1', ['as'=>'edit-outlet']);
	$route->put('outlet/edit-outlet/(:num)', 'Admin::update_outlet/$1');
	$route->delete('outlet/delete-outlet/(:num)', 'Admin::delete_outlet/$1', ['as'=>'delete-outlet']);

});

$routes->group('services', ['filter' => 'authentication'], function($route){
	$route->get('member', 'Layanan::render_member', ['as'=>'member']);
	$route->get('member/tambah-member', 'Layanan::render_form_member', ['as'=>'tambah-member']);
	$route->post('member/tambah-member', 'Layanan::insert_member');
	$route->get('member/edit-member/(:num)', 'Layanan::render_form_member/$1', ['as'=>'edit-member']);
	$route->put('member/edit-member/(:num)', 'Layanan::update_member/$1');
	$route->delete('member/delete-member/(:num)', 'Layanan::delete_member/$1', ['as'=>'delete-member']);

	$route->get('jenis', 'Layanan::render_jenis', ['as'=>'jenis']);
	$route->post('jenis', 'Layanan::insert_jenis', ['as'=>'tambah-jenis']);
	$route->put('jenis/(:num)', 'Layanan::update_jenis/$1', ['as'=>'edit-jenis']);
	$route->delete('jenis/(:num)', 'Layanan::delete_jenis/$1', ['as'=>'delete-jenis']);

	$route->get('diskon', 'Layanan::render_diskon', ['as'=>'diskon']);
	$route->get('diskon/tambah-diskon', 'Layanan::render_form_diskon', ['as'=>'tambah-diskon']);
	$route->post('diskon/tambah-diskon', 'Layanan::insert_diskon');
	$route->post('diskon/check', 'Layanan::check_diskon');
	$route->get('diskon/edit-diskon/(:num)', 'Layanan::render_form_diskon/$1', ['as'=>'edit-diskon']);
	$route->put('diskon/edit-diskon/(:num)', 'Layanan::update_diskon/$1');
	$route->delete('diskon/delete-diskon/(:num)', 'Layanan::delete_diskon/$1', ['as'=>'delete-diskon']);

	$route->get('paket', 'Layanan::render_paket', ['as'=>'paket']);
	$route->get('paket/tambah-paket', 'Layanan::render_form_paket', ['as'=>'tambah-paket']);
	$route->post('paket/tambah-paket', 'Layanan::insert_paket');
	$route->get('paket/edit-paket/(:num)', 'Layanan::render_form_paket/$1', ['as'=>'edit-paket']);
	$route->put('paket/edit-paket/(:num)', 'Layanan::update_paket/$1');
	$route->delete('paket/delete-paket/(:num)', 'Layanan::delete_paket/$1', ['as'=>'delete-paket']);
	
	$route->get('transaksi', 'Layanan::render_transaksi', ['as'=>'transaksi']);
	$route->get('transaksi/detail-transaksi/(:num)', 'Layanan::render_detail_transaksi/$1', ['as'=>'detail-transaksi']);
	$route->put('transaksi/detail-transaksi/(:num)/(:num)', 'Layanan::update_transaksi/$1/$2', ['as'=>'edit-transaksi']);
	$route->put('transaksi/detail-transaksi/bayar/(:num)', 'Layanan::update_transaksi_bayar/$1', ['as'=>'bayar-transaksi']);
	$route->get('transaksi/tambah-transaksi', 'Layanan::render_form_transaksi', ['as'=>'tambah-transaksi']);
	$route->post('transaksi/tambah-transaksi', 'Layanan::insert_transaksi');
	$route->get('transaksi/cetak/(:num)', 'Layanan::cetak_invoice/$1', ['as'=>'cetak-invoice']);

	$route->get('laporan', 'Layanan::render_laporan', ['as'=>'laporan']);
	$route->post('laporan', 'Layanan::render_laporan_data', ['as'=>'data-laporan']);
	$route->get('laporan/unduh-laporan', 'Layanan::download_laporan', ['as'=>'download-laporan']);

	$route->put('setting', 'Layanan::setting', ['as'=>'setting']);
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
