<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

// Route Inventaris Buku
$routes->get('/buku', 'Buku::index');
$routes->get('/buku/create', 'Buku::create');
$routes->post('/buku/simpan', 'Buku::simpan');

// Route Edit Buku
$routes->get('/buku/edit/(:num)', 'Buku::edit/$1');
$routes->post('/buku/update/(:num)', 'Buku::update/$1');

// Route Hapus Buku
$routes->post('/buku/hapus/(:num)', 'Buku::hapus/$1');

// Route Halaman Statistik
$routes->get('/buku/statistik', 'Buku::statistik');
