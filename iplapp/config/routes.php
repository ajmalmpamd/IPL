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
$route['test'] = 'test';

$route['default_controller'] = 'home';
$route['404_override'] = 'admin/not_found';
$route['translate_uri_dashes'] = FALSE;



/*** Admin ****/


$route['sitemanager/login'] = 'sitemanager/home/login';
$route['sitemanager/logout'] = 'sitemanager/home/logout';
$route['sitemanager/forgot_password'] = 'sitemanager/home/forgot_password';
$route['sitemanager/reset_password'] = 'sitemanager/home/reset_password';
$route['sitemanager/change_password'] = 'sitemanager/home/change_password';

$route['sitemanager/match/(:num)'] = 'sitemanager/match/index/$1';
$route['sitemanager/player/(:num)'] = 'sitemanager/player/index/$1';
$route['sitemanager/team/(:num)'] = 'sitemanager/team/index/$1';

/*** Front end ****/
$route['team/(:any)'] = 'home/team/$1';



