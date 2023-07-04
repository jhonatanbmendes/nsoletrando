<?php
namespace src\controllers;

use \core\Controller;
use \src\handler\LoginHandler;

class LoginController extends Controller {

    //OK
    public function entrar() {
        $flash = '';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->render('login',['flash' => $flash]);
    }

    //OK
    public function entrarAction(){
        $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
        $senha = filter_input(INPUT_POST, 'senha');
        
        // para evitar invasão XSS
        $usuario=htmlspecialchars($usuario);
        
        if($usuario && $senha){
            if(LoginHandler::existeUsuario($usuario)){

                $token = LoginHandler::verificarLogin($usuario, $senha);

                if($token){
                    $_SESSION['token'] = $token;
                    $this->redirect('/');
                }else{
                    $_SESSION['flash'] = 'Os dados não conferem.';
                    $this->redirect('/login');
                }
            }else{
                $_SESSION['flash'] = 'Os dados não conferem. -1';
                $this->redirect('/login');
            }
        }else{
            $_SESSION['flash'] = 'Preencha todos os dados. -2';
            $this->redirect('/login');
        }

    }
    
    public function resetarSenha(){
        $flash = '';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->render('resetarsenha',['flash' => $flash]);
    }

    public function resetarSenhaAction(){
        $dataNascimento = filter_input(INPUT_POST, 'dataNascimento', FILTER_SANITIZE_STRING);
        $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
        $senha = filter_input(INPUT_POST, 'novaSenha');
        
        // para evitar invasão XSS
        $usuario=htmlspecialchars($usuario);

        
        if($usuario && $senha){
            
            $dataNascimento = explode('/',$dataNascimento);
            if(count($dataNascimento) != 3){
                $_SESSION['flash'] = 'Data de nascimento inválida.';
                $this->redirect('/resetarsenha');
            }
            
            $dataNascimento = $dataNascimento[2].'-'.$dataNascimento[1].'-'.$dataNascimento[0];
            if(strtotime($dataNascimento) === false){
                $_SESSION['flash'] = 'Data de nascimento inválida.';
                $this->redirect('/resetarsenha');
            }
            
            if(LoginHandler::existeUsuario($usuario)){
                echo $dataNascimento."<br>";
                echo $usuario."<br>";
                echo $senha."<br>";

                if(LoginHandler::atualizaSenha($usuario, $senha, $dataNascimento)){
                    $this->redirect('/login');
                }
            }else{
                $_SESSION['flash'] = 'Os dados não conferem.';
                $this->redirect('/resetarsenha');
            }

        }else{
            $_SESSION['flash'] = 'Preencha todos os dados.';
            $this->redirect('/resetarsenha');
        }


    }

    //OK
    public function cadastrar(){
        $flash = '';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $perfil = LoginHandler::perfil();
        $serie = LoginHandler::serie();

        $ano = array_column($serie, 'ano');
        $ano = array_unique($ano);
        
        $this->render('cadastrar',['flash' => $flash, 'perfil' => $perfil, 'ano' => $ano, 'serie' => $serie]);
    }
    
    //OK
    public function cadastrarAction(){
        $nome = filter_input(INPUT_POST,'nome', FILTER_SANITIZE_STRING);
        $perfil = filter_input(INPUT_POST, 'perfil', FILTER_VALIDATE_INT);
        $turma = filter_input(INPUT_POST, 'turma', FILTER_VALIDATE_INT);
        $dataNascimento = filter_input(INPUT_POST, 'dataNascimento', FILTER_SANITIZE_STRING);
        $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
        $senha = filter_input(INPUT_POST, 'senha');
        $termo = filter_input(INPUT_POST, 'termo', FILTER_SANITIZE_STRING);
        
        // para evitar invasão XSS
        $nome=htmlspecialchars($nome);
        $usuario=htmlspecialchars($usuario);
        $termo=htmlspecialchars($termo);

        // TERMINEI A PARTE DE INSERÇÃO DE DADOS NO BANCO, MAS AINDA NÃO TESTEI. FALTA CRIAR A PÁGINA PARA ATUALIZAR O AVATAR

        if($nome && $perfil && $usuario && $senha && $termo){
            $dataNascimento = explode('/',$dataNascimento);
            if(count($dataNascimento) != 3){
                $_SESSION['flash'] = 'Data de nascimento inválida.';
                $this->redirect('/cadastrar');
            }
            
            $dataNascimento = $dataNascimento[2].'-'.$dataNascimento[1].'-'.$dataNascimento[0];
            if(strtotime($dataNascimento) === false){
                $_SESSION['flash'] = 'Data de nascimento inválida.';
                $this->redirect('/cadastrar');
            }

            // ajustar essa verificação de perfil por id
            $tipoPerfil = LoginHandler::verificaPerfil($perfil);
            if($tipoPerfil['nome'] === "aluno" or $tipoPerfil['nome'] === "professor"){
                if(!$turma){
                    $_SESSION['flash'] = 'Selecione todos os dados.';
                    $this->redirect('/cadastrar');
                }
            }

            if(LoginHandler::existeUsuario($usuario) === false){
                $token = LoginHandler::addPessoa($nome, $tipoPerfil['id'], $turma, $dataNascimento, $usuario, $senha);
                $_SESSION['token'] = $token;
                $this->redirect('/');
            }else{
                $_SESSION['flash'] = 'Esse nome de usuário já existe.';
                $this->redirect('/cadastrar');
            }

        }else{
            $_SESSION['flash'] = 'Preencha todos os dados.';
            $this->redirect('/cadastrar');
        }
    }

}