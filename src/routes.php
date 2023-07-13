<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/sair', 'HomeController@sair');
$router->get('/login', 'LoginController@entrar');
$router->post('/login', 'LoginController@entrarAction');
$router->get('/resetarsenha', 'LoginController@resetarSenha');
$router->post('/resetarsenha', 'LoginController@resetarSenhaAction');

$router->get('/chave', 'LoginController@chave');
$router->post('/chave', 'LoginController@chaveAction');
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
$router->get('/professor', 'ProfessorHomeController@index');

//GESTOR
$router->get('/gestor', 'GestorHomeController@index');
$router->get('/gestor/precadastro', 'GestorHomeController@precadastro');
$router->post('/gestor/precadastro', 'GestorHomeController@precadastroAction');
$router->get('/gestor/listarprecadastro', 'GestorHomeController@listarprecadastro');
$router->post('/gestor/listarprecadastro', 'GestorHomeController@listarprecadastroAction');
$router->get('/gestor/inativarprecadastro/{id}', 'GestorHomeController@inativarprecadastro');
$router->get('/gestor/cadastraravatar', 'GestorHomeController@cadastraravatar');
$router->post('/gestor/cadastraravatar', 'GestorHomeController@cadastraravatarAction');
$router->get('/gestor/listaravatar', 'GestorHomeController@listaravatar');
$router->get('/gestor/alteraravatar/{id}', 'GestorHomeController@alteraravatar');
$router->get('/gestor/cadastraremoji', 'GestorHomeController@cadastraremoji');
$router->post('/gestor/cadastraremoji', 'GestorHomeController@cadastraremojiAction');
$router->get('/gestor/listaremoji', 'GestorHomeController@listaremoji');
$router->get('/gestor/alteraremoji/{id}', 'GestorHomeController@alteraremoji');
$router->get('/gestor/cadastrarpalavra', 'GestorHomeController@cadastrarpalavra');
$router->post('/gestor/cadastrarpalavra', 'GestorHomeController@cadastrarpalavraAction');
$router->get('/gestor/listarpalavra/{ano}', 'GestorHomeController@listarpalavraAno');
$router->get('/gestor/listarpalavra', 'GestorHomeController@listarpalavra');
$router->get('/gestor/alterarpalavra/{id}', 'GestorHomeController@alterarpalavra');

// ADMINISTRADOR
$router->get('/administrador', 'AdministradorHomeController@index');
$router->get('/administrador/cadastrar', 'AdministradorHomeController@cadastrar');
$router->post('/administrador/cadastrar', 'AdministradorHomeController@cadastrarAction');
$router->get('/administrador/precadastro', 'AdministradorHomeController@precadastro');
$router->post('/administrador/precadastro', 'AdministradorHomeController@precadastroAction');
$router->get('/administrador/inativargestor/{id}', 'AdministradorHomeController@inativarGestor');


$router->get('/adm/sobre', 'HomeController@sobre');
// $router->get('/sobre/{nome}', 'HomeController@sobreP');
// $router->get('/sobre', 'HomeController@sobre');