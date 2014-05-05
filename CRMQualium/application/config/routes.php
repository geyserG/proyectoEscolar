<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//$route['default_controller'] = "escritorio";
//$route['404_override'] = '';

$route['default_controller'] = "escritorio";
//$route['(:any)'] = 'escritorio/index/$1';
$route['escritorio'] = 'escritorio/index/$1';

# Rutas para el cliente
$route['modulo_Clientes'] = 'escritorio/clientes';
$route['modulo_cliente_nuevo'] = 'escritorio/clientes/$1';
$route['modulo_consulta_clientes'] = 'escritorio/clientes/$1';
$route['modulo_consulta_prospectos'] = 'escritorio/clientes/$1';


//Rutas para la proyectos
$route['modulo_proyectos'] = 'escritorio/proyectos/$1';
<<<<<<< HEAD
$route['modulo_proyectos_consulta'] = 'escritorio/proyectos/$1';
$route['modulo_proyectos_nuevo'] = 'escritorio/proyectos/$1';
=======
// $route['modulo_proyectos'] = 'escritorio/cotizacion/$1';
// $route['modulo_proyectos'] = 'escritorio/cotizacion/$1';
>>>>>>> 79d0511b0d7b05a40e6f4b5d51674abb33c1fdae

//Rutas para la contratos...
$route['modulo_contratos'] = 'escritorio/contratos/$1';
$route['modulo_contratos_nuevo'] = 'escritorio/contratos/$1';
$route['modulo_contratos_historial'] = 'escritorio/contratos/$1';

//Rutas para la cotizacion
$route['modulo_cotizaciones'] = 'escritorio/cotizacion/$1';
$route['modulo_cotizaciones_nuevo'] = 'escritorio/cotizacion/$1';
$route['modulo_cotizaciones_consulta'] = 'escritorio/cotizacion/$1';

//Rutas para la facturas...
$route['modulo_facturas'] = 'escritorio/facturas/$1';
// $route['modulo_facturass'] = 'escritorio/facturas/$1';
// $route['modulo_facturas'] = 'escritorio/facturas/$1';

//Rutas para la actividades...
$route['modulo_actividades'] = 'escritorio/actividades/$1';
// $route['modulo_actividades'] = 'escritorio/actividades/$1';
// $route['modulo_actividades'] = 'escritorio/actividades/$1';

//Rutas para la catalogos...
$route['modulo_catologos'] = 'escritorio/catalogos/$1';
// $route['modulo_catologos'] = 'escritorio/catologos/$1';
// $route['modulo_catologos'] = 'escritorio/catologos/$1';

//Rutas para el modilo de usuarios...
$route['modulo_usuarios'] = 'escritorio/usuarios/$1';
// $route['modulo_usuarios'] = 'escritorio/usuarios/$1';
// $route['modulo_usuarios'] = 'escritorio/usuarios/$1';

//Rutas para el modulo de configuracion...
$route['modulo_configuracion'] = 'escritorio/configuracion/$1';
// $route['modulo_configuracion'] = 'escritorio/configuracion/$1';
// $route['modulo_configuracion'] = 'escritorio/configuracion/$1';

#################-----RUTAS PARA LAS APIS------######################
$route['api_telefonos'] = 'api_telefono/api';
$route['api_telefonos/(:num)'] = 'api_telefono/api/$1';


$route['api_contactos'] = 'api_contacto/api';
$route['api_contactos/(:num)'] = 'api_contacto/api/$1';

# Rutas para la api de clientes...
<<<<<<< HEAD

$route['api_cliente'] = 'api_cliente/api';
$route['api_cliente/(:num)'] = 'api_cliente/api';

=======

$route['api_cliente'] = 'api_cliente/api';
$route['api_cliente/(:num)'] = 'api_cliente/api';

>>>>>>> 79d0511b0d7b05a40e6f4b5d51674abb33c1fdae
# Ruta para la api de representantes...
$route['api_representante'] = 'representante/api';
$route['api_representante/(:num)'] = 'representante/api/$1';

# Ruta para la api de Servicios...
$route['api_servicios'] = 'servicios/api';
$route['api_servicios/(:num)'] = 'servicios/api/$1';

# Ruta para la api de Servicios...
$route['api_actividades'] = 'actividades/api';
$route['api_actividades/(:num)'] = 'actividades/api/$1';

# Ruta para la api de Usuarios...
$route['api_usuarios'] = 'usuarios/api';
$route['api_usuarios/(:num)'] = 'usuarios/api/$1';

# Ruta para la api de Perfil...
$route['api_perfil'] = 'perfil/api';
$route['api_perfil/(:num)'] = 'perfil/api/$1';

# Ruta para la api de Permisos...
$route['api_permisos'] = 'permisos/api';
$route['api_permisos/(:num)'] = 'permisos/api/$1';

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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
/* End of file routes.php */
/* Location: ./application/config/routes.php */