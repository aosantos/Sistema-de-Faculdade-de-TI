<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller']          = 'login';
$route['404_override']                = '';
$route['translate_uri_dashes']        = FALSE;
$route['logar_diretor']               = "login/logar_diretor";
$route['logar_operador']              = "login/logar_operador";
$route['logar_professor']             = "login/logar_professor";
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
$route['desativa']                    = "aluno/desativar_aluno";
$route['ativa']                       = "aluno/ativar_aluno";
$route['meudiretor']                  = "professor/meudiretor";
$route['meualuno']                    = "professor/meusalunos";
$route['disciplinas']                 = "disciplinas/index";





