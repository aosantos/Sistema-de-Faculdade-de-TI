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
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
//$route['login_diretor']               = "login/diretor";
$route['logar_diretor']               = "login/logar_diretor";
$route['logar_operador']              = "login/logar_operador";
//$route['login_professor']             = "login/professor";
//$route['login_aluno']                 = "login/aluno";
//$route['login_operador']              = "login/operador";
$route['sair']                        = "login/logout";
$route['diretor']                     = "diretor/index";
$route['departamento']                = "diretor/departamento";
$route['add_departamento']            = "diretor/add_departamento";
$route['curso']                       = "curso/index";
$route['professor']                   = "professor/index";
$route['aluno']                       = "aluno/index";
$route['operador']                    = "operador/index";
$route['professor']                   = "professor/index";
$route['editar_departamento']         = "diretor/editar_departamento";
$route['removeDepartamento']          = "diretor/removeDepartamento";
$route['add_diretor']                 = "diretor/add_diretor";
$route['editar_diretor']              = "diretor/editar_diretor";
$route['removeDiretor']               = "diretor/removeDiretor";
$route['add_cursos']                  = "curso/add_cursos";
$route['editar_curso']                = "curso/editar_curso";
$route['removeCurso']                 = "curso/removeCurso";
$route['add_professor']               = "professor/add_professor";
$route['editar_professor']            = "professor/editar_professor";
$route['removeProfessor']             = "professor/removeProfessor";
$route['add_operador']                = "operador/add_operador";
$route['editar_operador']             = "operador/editar_operador";
$route['removeOperador']              = "operador/removeOperador";
$route['home']                        = "diretor/home";
$route['add_aluno']                   = "operador/add_aluno";
$route['editar_aluno']                = "operador/editar_aluno";










