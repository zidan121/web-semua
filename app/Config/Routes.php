<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

// Admin yayasan: terpisah dari akun admin sekolah.
$routes->get('admin/yayasan/setup', 'FoundationAdmin::setup');
$routes->post('admin/yayasan/setup', 'FoundationAdmin::setup');
$routes->get('admin/yayasan/login', 'FoundationAdmin::login');
$routes->post('admin/yayasan/login', 'FoundationAdmin::login');
$routes->get('admin/yayasan/logout', 'FoundationAdmin::logout');
$routes->get('admin/yayasan', 'FoundationAdmin::index');
$routes->get('admin/yayasan/tampilan', 'FoundationSiteSettings::index');
$routes->post('admin/yayasan/tampilan', 'FoundationSiteSettings::index');
$routes->get('admin/yayasan/sekolah', 'FoundationAdmin::schools');
$routes->post('admin/yayasan/sekolah', 'FoundationAdmin::schools');
$routes->get('sekolah/(:segment)', 'SchoolSite::show/$1');

$routes->get('admin/sekolah/login', 'AdminAuth::login');
$routes->post('admin/sekolah/login', 'AdminAuth::login');
$routes->get('admin/sekolah/logout', 'AdminAuth::logout');

$routes->get('admin/sekolah', 'SchoolAdmin::index');
$routes->get('admin/sekolah/pengaturan', 'SchoolAdmin::settings');
$routes->post('admin/sekolah/pengaturan', 'SchoolAdmin::settings');
$routes->get('admin/sekolah/bagian', 'SchoolSections::index');
$routes->post('admin/sekolah/bagian', 'SchoolSections::index');
