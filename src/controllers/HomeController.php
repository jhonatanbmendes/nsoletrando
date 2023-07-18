<?php
namespace src\controllers;

use \core\Controller;
use \src\handler\LoginHandler;
use \src\handler\AlunoHandler;

class HomeController extends Controller {

    private $usuarioLogado;

    public function __construct(){
        $this->$usuarioLogado = LoginHandler::checkLogin();
        if(LoginHandler::checkLogin() === false){
            $this->redirect('/login');
        }
    }

    public function index() {

        $pessoa = AlunoHandler::getAlunosHome();

        $this->render('home', ['pessoa' => $pessoa]);
    }

    public function sobre() {
        $this->render('adm/sobre');
    }

    public function sair(){
        $_SESSION['token'] = '';
        $this->redirect('/login');
    }

    // public function sobreP($args) {
    //     print_r($args);
    // }

}