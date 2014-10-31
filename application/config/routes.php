<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



$route['default_controller'] = "front";
$route['encuentros'] = 'front/encuentros/$1';
$route['encuentros/(:num)'] = 'front/encuentros/$1';

$route['notas'] = 'front/notas/$1';
$route['notas/(:num)'] = 'front/notas/$1';
$route['tendencias'] = 'front/notas_por/tendencias';
$route['tendencias/(:num)'] = 'front/notas_por_slug/tendencias';
$route['informes'] = 'front/notas_por_slug/informes';
$route['informes/(:num)'] = 'front/notas_por_slug/informes';

$route['404_override'] = '';

############## BACKEND #######################
$route['control'] = 'dashboard';
$route['control/logout'] = 'dashboard/logout';


$route['migrate/(:num)'] = 'migrate/index/$';
$route['control/eventos/(:num)'] = 'control/eventos/index/$1';
$route['control/categorias_eventos/(:num)'] = 'control/categorias_eventos/index/$1';
$route['control/categorias_notas/(:num)'] = 'control/categorias_notas/index/$1';
$route['control/speakers/(:num)'] = 'control/speakers/index/$1';
$route['control/sponsors/(:num)'] = 'control/sponsors/index/$1';

$route['control/sponsors/evento/(:num)'] = 'control/sponsors/index/$1';

$route['control/speakers/evento/(:num)'] = 'control/speakers/index/$1';

$route['control/paises/(:num)'] = 'paises/index/$';
$route['control/videos/(:num)'] = 'control/videos/index/$';
/* append */
/* Location: ./application/config/routes.php */
