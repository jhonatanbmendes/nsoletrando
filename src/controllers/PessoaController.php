<?php
namespace src\controllers;

use \core\Controller;
use \src\handler\LoginHandler;
use \src\handler\AlunoHandler;

class PessoaController extends Controller {
    
    private $usuarioLogado;

    public function __construct(){
        $this->usuarioLogado = LoginHandler::checkLogin();
        if(LoginHandler::checkLogin() === false){
            $this->redirect('/login');
        }
    }

    public function perfil(){
        $this->render('perfil', ['pessoa'=> $this->usuarioLogado]);
    }

    public function alterarAvatar(){

        $avatar = LoginHandler::getAvatar();

        $this->render('alteraravatar', ['avatar'=> $avatar]);
    }

    public function updateAvatar($args){
        $args = intval($args['id']);
        if(is_int($args)){
            LoginHandler::updateAvatar($_SESSION['token'], $args);
        }
        $this->redirect('/perfil');
    }

    public function rankingIndividual(){
        
        $this->render('rankingindividual', ['pessoa'=> $this->usuarioLogado]);
    }
    
    public function alterarSenha(){
        $flash = '';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $this->render('alterarsenha', ['flash' => $flash, 'pessoa'=> $this->usuarioLogado]);
    }

    public function alterarSenhaAction(){
        $senha1 = filter_input(INPUT_POST, 'senha1');
        $senha2 = filter_input(INPUT_POST, 'senha2');

        if($senha1 && $senha2){
            if($senha1 === $senha2){
                echo $senha1;
                echo " - id: ".$this->usuarioLogado->id;
                $resultado = AlunoHandler::atualizaSenha($senha1, $this->usuarioLogado->id);
                if($resultado == true){
                    $this->redirect('/perfil');
                }
            }
        }
        $_SESSION['flash'] = 'Preencha com a nova senha.';
        $this->redirect('/alterarsenha');
    }


}