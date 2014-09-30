<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



$route['default_controller'] = "welcome";
$route['404_override'] = '';


$route['control'] = 'dashboard';
$route['control/logout'] = 'dashboard/logout';
$route['migrate/(:num)'] = 'migrate/index/$';
$route['control/eventos/(:num)'] = 'control/eventos/index/$1';
$route['control/categorias_eventos/(:num)'] = 'control/categorias_eventos/index/$1';
$route['control/speakers/(:num)'] = 'control/speakers/index/$1';
$route['control/sponsors/(:num)'] = 'control/sponsors/index/$1';


$route['control/paises/(:num)'] = 'paises/index/$';
/* append */
/* Location: ./application/config/routes.php */
