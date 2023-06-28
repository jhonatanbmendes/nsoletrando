<?php
namespace src\controllers;

use \core\Controller;
use \src\handler\LoginHandler;

class PalavraController extends Controller {
    
    private $usuarioLogado;

    public function __construct(){
        $this->$usuarioLogado = LoginHandler::checkLogin();
        if(LoginHandler::checkLogin() === false){
            $this->redirect('/login');
        }
    }

    public function jogo(){
        $this->render('jogo', ['nome'=> 'Jhonatan']);
    }

    public function resultado(){
        $this->render('resultado', ['nome'=> 'Jhonatan']);
    }


}