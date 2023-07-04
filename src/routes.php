<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/sair', 'HomeController@sair');
$router->get('/login', 'LoginController@entrar');
$router->post('/login', 'LoginController@entrarAction');
$router->get('/resetarsenha', 'LoginController@resetarSenha');
$router->post('/resetarsenha', 'LoginController@resetarSenhaAction');
$router->get('/cadastrar', 'LoginController@cadastrar');
$router->post('/cadastrar', 'LoginController@cadastrarAction');
$router->get('/jogo', 'PalavraController@jogo');
// $router->post('/jogo', 'PalavraController@jogoAction');
$router->get('/resultado', 'PalavraController@resultado');
$router->get('/perfil', 'PessoaController@perfil');
$router->get('/rankingindividual', 'PessoaController@rankingIndividual');
$router->get('/alteraravatar', 'PessoaController@alterarAvatar');
// $router->post('/alteraravatar', 'PessoaController@alterarAvatarAction');
$router->get('/alterarsenha', 'PessoaController@alterarSenha');
// $router->post('/alterarsenha', 'PessoaController@alterarSenhaAction');

//PROFESSOR
$router->get('/professor/home', 'ProfessorHomeController@index');

//GESTOR
$router->get('/gestor/home', 'GestorHomeController@index');

// ADMINISTRADOR
$router->get('/administrador/home', 'AdministradorHomeController@index');


$router->get('/adm/sobre', 'HomeController@sobre');
// $router->get('/sobre/{nome}', 'HomeController@sobreP');
// $router->get('/sobre', 'HomeController@sobre');