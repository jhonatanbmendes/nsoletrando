<?php
namespace src\controllers;

use \core\Controller;
use \src\handler\LoginHandler;
use \src\models\Pessoa;
use \src\models\Perfil;

class GestorHomeController extends Controller {

    private $usuarioLogado;

    public function __construct(){
        $this->$usuarioLogado = LoginHandler::checkLogin();
        if(LoginHandler::checkLogin() === false){
            $this->redirect('/login');
        }
        $pessoa = Pessoa::select()->where('id', $this->$usuarioLogado->id)->one();
        $perfil = Perfil::select()->where('id', $pessoa['id_perfil'])->one();

        if($perfil['nome'] !== 'administrador' && $perfil['nome'] !== 'gestor'){
            $_SESSION['token'] = '';
            $this->redirect('/login');
        }
    }

    public function index() {
        $this->render('gestor/home', ['pessoa' => $this->$usuarioLogado]);
    }

    public function sobre() {
        $this->render('adm/sobre');
    }

    public function sair(){
        $_SESSION['token'] = '';
        $this->redirect('/login');
    }

}