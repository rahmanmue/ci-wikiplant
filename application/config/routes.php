<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'wikiplant';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

$route['login_u'] = 'backend/auth/login';
$route['register_u'] = 'backend/auth/register';
$route['logout_u'] = 'backend/auth/logout';

$route['myprofil'] = 'backend/profil/index';
$route['myprofil/save'] = 'backend/profil/save';

$route['list-admin'] = 'backend/admin/index';
$route['list-admin/edit'] = 'backend/admin/edit';
$route['list-admin/hapus'] = 'backend/admin/hapus';

$route['kategori-berita'] = 'backend/K_Berita';
$route['kategori-berita/tambah'] = 'backend/K_Berita/tambah';
$route['kategori-berita/edit'] = 'backend/K_Berita/edit';
$route['kategori-berita/hapus'] = 'backend/K_Berita/hapus';

$route['list-berita'] = 'backend/berita/index';
$route['list-berita/tambah'] = 'backend/berita/tambah';
$route['list-berita/edit'] = 'backend/berita/edit';
$route['list-berita/hapus'] = 'backend/berita/hapus';

$route['dashboard-web'] = 'backend/dashboard/index';
$route['konfigurasi-web'] = 'backend/konfigurasi';

$route['list-katalog'] = 'backend/katalog/index';
$route['list-katalog/tambah'] = 'backend/katalog/tambah';
$route['list-katalog/edit'] = 'backend/katalog/edit';
$route['list-katalog/hapus'] = 'backend/katalog/hapus';

$route['list-banner'] = 'backend/banner/index';
$route['list-banner/tambah'] = 'backend/banner/tambah';
$route['list-banner/edit'] = 'backend/banner/edit';
$route['list-banner/hapus'] = 'backend/banner/hapus';

$route['berita/(:any)'] = 'wikiplant/berita/$1';
$route['katalog/(:any)'] = 'wikiplant/katalog/$1';

$route['berita'] = 'wikiplant/berita_list_home';
$route['katalog'] = 'wikiplant/katalog_list_home';

$route['page-katalog/index'] = 'wikiplant/katalog_list_home';
$route['page-katalog/index/(:num)'] = 'wikiplant/katalog_list_home/index/$1';

$route['page-berita/index'] = 'wikiplant/berita_list_home';
$route['page-berita/index/(:num)'] = 'wikiplant/berita_list_home/$1';


$route['page-kategori-berita/(:any)'] = 'wikiplant/page_kategori_berita/$1';
$route['page-kategori-berita/(:any)/(:num)'] = 'wikiplant/page_kategori_berita/$1/$1';

$route['profil'] = 'wikiplant/profil';
$route['hubungi'] = 'wikiplant/hubungi';









