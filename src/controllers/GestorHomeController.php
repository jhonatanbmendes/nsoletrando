<?php
namespace src\controllers;

use \core\Controller;
use \src\handler\LoginHandler;
use \src\models\Pessoa;
use \src\models\Perfil;
use \src\models\Avatar;

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

        $perfilProfessor = Perfil::select()->where('nome', 'professor')->one();
        $perfilAluno = Perfil::select()->where('nome', 'aluno')->one();

        $dados = Pessoa::select()->where('id_perfil', 'in', [$perfilAluno['id'],$perfilProfessor['id']])->get();

        $pessoa = [];
        foreach($dados as $dadosItem){
            $newPessoa = new Pessoa();
            $newPessoa->id = $dadosItem['id'];
            $newPessoa->nome = $dadosItem['nome'];
            $avatar = Avatar::select()->where('id', $dadosItem['id_avatar'])->one();
            $newPessoa->avatar = $avatar['arquivo'];

            $pessoa[] = $newPessoa;
        }

        $this->render('gestor/home', ['pessoa' => $pessoa]);
    }

    public function sobre() {
        $this->render('adm/sobre');
    }

    public function sair(){
        $_SESSION['token'] = '';
        $this->redirect('/login');
    }

}