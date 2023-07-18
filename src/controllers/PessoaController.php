<?php
namespace src\controllers;

use \core\Controller;
use \src\handler\LoginHandler;

class PessoaController extends Controller {
    
    private $usuarioLogado;

    public function __construct(){
        $this->$usuarioLogado = LoginHandler::checkLogin();
        if(LoginHandler::checkLogin() === false){
            $this->redirect('/login');
        }
    }

    public function perfil(){
        $this->render('perfil', ['pessoa'=> $this->$usuarioLogado]);
    }

    public function alterarAvatar(){
        $this->render('alteraravatar', ['nome'=> 'jhonatan']);
    }

    public function rankingIndividual(){
        
        $this->render('rankingindividual', ['pessoa'=> $this->$usuarioLogado]);
    }
    
    public function alterarSenha(){
        $this->render('alterarsenha', ['pessoa'=> $this->$usuarioLogado]);
    }


}