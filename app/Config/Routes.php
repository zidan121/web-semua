<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('sekolah/(:segment)', 'SchoolSite::show/$1');

$routes->get('admin/sekolah/login', 'AdminAuth::login');
$routes->post('admin/sekolah/login', 'AdminAuth::login');
$routes->get('admin/sekolah/logout', 'AdminAuth::logout');

$routes->get('admin/sekolah', 'SchoolAdmin::index');
$routes->get('admin/sekolah/pengaturan', 'SchoolAdmin::settings');
$routes->post('admin/sekolah/pengaturan', 'SchoolAdmin::settings');
$routes->get('admin/sekolah/bagian', 'SchoolSections::index');
$routes->post('admin/sekolah/bagian', 'SchoolSections::index');
