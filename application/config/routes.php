<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller']    = 'main';

//  AUTH
$route['lupa-password']         = 'auth/reset';
$route['lupa-password/(:any)']  = 'auth/reset/$1';
$route['logout']                = 'auth/logout';
$route['daftar']                = 'auth/register';
$route['login']                 = 'auth/login';
$route['(:any)/login']          = 'auth/login/$1';

//  SUPERADMIN
$route['as']                    = 'main/as';
// ===
$route['superadmin']                              = 'superadmin/CS_main';
$route['superadmin/data-member/(:any)/(:any)']    = 'superadmin/CS_panel/$1/data_member/$2';
$route['superadmin/data-provider/(:any)/(:any)']  = 'superadmin/CS_panel/$1/data_provider/$2';
$route['superadmin/(:any)']                       = 'superadmin/CS_main/$1';

//  PROVIDER
$route['provider']                 = 'provider/CP_main';
$route['provider/dashboard']       = 'provider/CP_main';
$route['provider/data-lapangan/(:any)/(:any)']    = 'superadmin/CP_panel/$1/data_lapangan/$2';
$route['provider/data-booking/(:any)/(:any)']     = 'superadmin/CP_panel/$1/data_booking/$2';
$route['provider/(:any)']          = 'provider/CP_main/$1';

//  MEMBER
$route['member']                 = 'member/CM_main';
$route['member/dashboard']       = 'member/CM_main';
$route['member/(:any)']          = 'member/CM_main/$1';



$route['404_override']          = '';
$route['translate_uri_dashes']  = TRUE;
