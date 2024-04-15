<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('mahasiswa/', 'Mahasiswa::index');
$routes->add('jadwal_kuliah', 'Jadwal_Kuliah::index');
$routes->get('matakuliah', 'Matakuliah::index');
$routes->get('matakuliah/detail/(:any)', 'Matakuliah::detail/$1');
$routes->get('matakuliah/create', 'Matakuliah::create');
$routes->post('matakuliah/save', 'Matakuliah::save', ['as' => 'matakuliah.save']);
$routes->get('matakuliah/save', 'Matakuliah::save', ['as' => 'matakuliah.save']);
$routes->delete('/matakuliah/(:num)', 'Matakuliah::delete/$1', ['as' => 'matakuliah.delete']);
$routes->get('matakuliah/edit/(:any)', 'Matakuliah::edit/$1', ['as' => 'matakuliah.edit']);
$routes->post('matakuliah/update/(:any)', 'Matakuliah::update/$1', ['as' => 'matakuliah.update']);


//routes Mahasiswa

$routes->get('/mahasiswa/detail/(:segment)', 'Mahasiswa::detail/$1');
// app/Config/Routes.php

$routes->get('mahasiswa/create', 'Mahasiswa::create');
// app/Config/Routes.php

$routes->match(['get', 'post'], 'mahasiswa/create', 'Mahasiswa::create');
$routes->post('mahasiswa/save', 'Mahasiswa::save');
$routes->delete('/mahasiswa/(:num)', 'Mahasiswa::delete/$1');
// $routes->get('/mahasiswa/edit(:segment)', "Mahasiswa::edit/$1");
// app/Config/Routes.php
$routes->get('mahasiswa/edit/(:any)', 'Mahasiswa::edit/$1');
// app/Config/Routes.php
// $routes->post('mahasiswa/update', 'Mahasiswa::update/$1');
// app/Config/Routes.php
// $routes->post('mahasiswa/update', 'Mahasiswa::update');
// app/Config/Routes.php
$routes->get('mahasiswa/edit/(:any)', 'Mahasiswa::edit/$1');
$routes->get('edit/(:segment)', 'Mahasiswa::edit/$1');
$routes->get('mahasiswa/edit/(:any)', 'Mahasiswa::edit/$1');
$routes->post('mahasiswa/update/(:num)', 'Mahasiswa::update/$1');
$routes->get('mahasiswa/kontak', 'Mahasiswa::kontak');







