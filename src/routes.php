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
$router->get('/alterarsenha', 'LoginController@alterarSenha');
// $router->post('/alterarsenha', 'LoginController@alterarSenhaAction');
$router->get('/jogo', 'PalavraController@jogo');
// $router->post('/jogo', 'PalavraController@jogoAction');
$router->get('/resultado', 'PalavraController@resultado');
$router->get('/perfil', 'PessoaController@perfil');
$router->get('/rankingindividual', 'PessoaController@rankingIndividual');
$router->get('/alteraravatar', 'PessoaController@alterarAvatar');
// $router->post('/alteraravatar', 'PessoaController@alterarAvatarAction');





$router->get('/adm/sobre', 'HomeController@sobre');
// $router->get('/sobre/{nome}', 'HomeController@sobreP');
// $router->get('/sobre', 'HomeController@sobre');