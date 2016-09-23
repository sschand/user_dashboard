<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "main";
$route['signin'] = "main/signin";
$route['register'] = "main/register";
$route['users/new'] = "users/new_user";
$route['users/edit'] = "users/edit";
$route['users/edit/(:any)'] = "users/edit_user/$1";
$route['users/remove/(:num)'] = "users/remove/$1";
$route['404_override'] = '';

//end of routes.php
