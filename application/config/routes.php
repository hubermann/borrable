<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$route['default_controller'] = "front";
#####  PRESENTACIONES   #####
$route['EncuentroHayGroup'] = 'presentaciones/EncuentroHayGroup';
#####  FRONT   #####

$route['comentarios_notas/nuevo/'] = 'comentarios_notas/nuevo/';


$route['inicio'] = 'front/inicio';
$route['encuentros'] = 'front/encuentros/$1';
$route['encuentros/(:num)'] = 'front/encuentros/$1';
$route['encuentro'] = 'front/detalle_evento';
$route['encuentro/(:num)'] = 'front/detalle_evento/$1';
$route['encuentro/(:num)/(:any)'] = 'front/detalle_evento/$1';
$route['inscripcion_encuentro'] = 'eventos/inscripcion';

$route['notas'] = 'front/notas/$1';
$route['notas/(:num)'] = 'front/notas/$1';
$route['nota/(:num)'] = 'front/detalle_nota/$1';
$route['nota/(:num)/(:any)'] = 'front/detalle_nota/$1';
$route['tendencias'] = 'front/notas_por_slug/tendencias';
$route['tendencias/(:num)'] = 'front/notas_por_slug/tendencias';
$route['informes'] = 'front/notas_por_slug/informes';
$route['informes/(:num)'] = 'front/notas_por_slug/informes';
$route['tecnologia'] = 'front/notas_por_slug/tecnologia';
$route['tecnologia/(:num)'] = 'front/notas_por_slug/tecnologia';
$route['notas'] = 'front/notas_por_slug/notas';
$route['notas/(:num)'] = 'front/notas_por_slug/notas';
$route['negocios'] = 'front/notas_por_slug/negocios';
$route['negocios/(:num)'] = 'front/notas_por_slug/negocios';
$route['casos'] = 'front/notas_por_slug/casos';
$route['casos/(:num)'] = 'front/notas_por_slug/casos';
$route['suplementos'] = 'front/notas_por_slug/suplementos';
$route['suplementos/(:num)'] = 'front/notas_por_slug/suplementos';
$route['opinion'] = 'front/notas_por_slug/opinion';
$route['opinion/(:num)'] = 'front/notas_por_slug/opinion';
$route['tv'] = 'front/notas_por_slug/tv';
$route['tv/(:num)'] = 'front/notas_por_slug/tv';
$route['busqueda'] = 'front/busqueda/$1';
$route['busqueda/(:num)'] = 'front/busqueda/$1';
/* LOGIN */
$route['registro'] = 'users_front/registro';
$route['ingreso'] = 'users_front/ingreso';
$route['desconectar'] = 'users_front/desconectar';
$route['perfil'] = 'users_front/perfil';
$route['perfil-editar'] = 'users_front/perfil_modificar';
$route['perfil-imagen'] = 'users_front/perfil_modificar_imagen';
$route['perfil-cargar-imagen'] = 'users_front/upload_imagen';
$route['perfil-modificar-acceso'] = 'users_front/perfil_modificar_password';
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
$route['control/notas/(:num)'] = 'control/notas/index/$';
/* append */
/* Location: ./application/config/routes.php */
