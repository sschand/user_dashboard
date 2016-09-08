<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "main";
$route['signin'] = "Main/signin";
$route['register'] = "Main/register";
$route['users/new'] = "Users/new_user";
$route['users/edit'] = "Users/edit";
$route['users/edit/(:any)'] = "Users/edit_user/$1";
$route['users/remove/(:num)'] = "Users/remove/$1";
$route['404_override'] = '';

//end of routes.php