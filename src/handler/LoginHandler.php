<?php
namespace src\handler;

use \src\models\Pessoa;
use \src\models\Perfil;
use \src\models\Serie;
use \src\models\Login;
use \src\models\Avatar;
use \src\models\Contagem;

class LoginHandler {

    // Adaptada para o novo sistema
    public static function checkLogin(){
        if(!empty($_SESSION['token'])){
            $token = $_SESSION['token'];

            $data = Pessoa::select()->where('token', $token)->one();

            if(count($data) > 0){
                $usuarioLogado = new Pessoa();
                $usuarioLogado->id = $data['id'];
                // $nomeUsuario = $data['nome'];
                // $nomeUsuario = explode(' ',$nomeUsuario);
                // $usuarioLogado->nome = $nomeUsuario[0];
                $usuarioLogado->nome = $data['nome'];
                $usuarioLogado->acerto = $data['acerto'];

                $avatar = Avatar::select()->where('id', $data['id_avatar'])->one();

                $usuarioLogado->avatar = $avatar['arquivo'];

                return $usuarioLogado;

            }
        }
        return false;
    }

    public static function verificarLogin($usuario, $senha){
        $login = Login::select()->where('usuario', $usuario)->one();

        $senha = md5($senha); // para criptografar a senha
        if($login){
            // if(password_verify($senha, $alunos['senha'])){
            if($senha === $login['senha']){
                $token = md5(time().rand(0,9999).time());

                Pessoa::update()
                    ->set('token',$token)
                    ->where('id',$login['id_pessoa'])
                ->execute();

                return $token;
            }
        }
        return false;
    }

    // Adaptada para o novo sistema
    public static function verificaPerfil($perfil){
        $tipoPefil = Perfil::select()->where('id', $perfil)->one();
        return $tipoPefil;
    }

    public static function verificaToken($token){
        $pessoa = Pessoa::select()->where('token', $token)->one();
        return $pessoa;
    }
    
    public static function perfil(){
        $dados = Perfil::select()->get();
        
        $perfil = [];
        foreach($dados as $perfilItem){
            $newPerfil = new Perfil();
            $newPerfil->id = $perfilItem['id'];
            $newPerfil->nome = $perfilItem['nome'];

            $perfil[] = $newPerfil;
        }
        
        return $perfil;
    }
    public static function serie(){
        $dados = Serie::select()->get();

        $serie = [];
        foreach($dados as $dadosItem){
            $newSerie = new Serie();
            $newSerie->id = $dadosItem['id'];
            $newSerie->ano = $dadosItem['ano'];
            $newSerie->turma = $dadosItem['turma'];

            $serie[] = $newSerie;
        }
        return $serie;
    }

    // Adaptada para o novo sistema
    public static function existeUsuario($usuario){
        $usuario = Login::select()->where('usuario', $usuario)->one();
        return $usuario;
    }

    // Adaptada para o novo sistema
    public static function addPessoa($nome, $perfil, $turma, $dataNascimento, $usuario, $senha){
        
        if($turma){
            $token = md5(time().rand(0,9999).$usuario);
            Pessoa::insert([
                'nome' => $nome,
                'data_nascimento' => $dataNascimento,
                'id_perfil' => $perfil,
                'id_serie' => $turma,
                'token' => $token
                ])->execute();
            }else{
                $token = md5(time().rand(0,9999).$usuario);
                Pessoa::insert([
                    'nome' => $nome,
                    'data_nascimento' => $dataNascimento,
                    'id_perfil' => $perfil,
                    'token' => $token
                    ])->execute();
            }
            
        $idPessoa = Pessoa::select('id')->where('token', $token)->one();
        $senha = md5($senha);
        Login::insert([
            'usuario' => $usuario,
            'senha' => $senha,
            'id_pessoa' => $idPessoa['id']
            ])->execute();

        date_default_timezone_set('America/Manaus');
        $data = Date("Y-m-d", time());
        
        Contagem::insert([
            'data' => $data,
            'id_pessoa' => $idPessoa['id'],
        ])->execute();
            

        return $token;

    }

    public static function atualizaSenha($usuario, $novaSenha, $dataNascimento){
        $login = Login::select()->where('usuario', $usuario)->one();

        // parei aqui
        $pessoa = Pessoa::select()->where('id', $login['id_pessoa'])->one();

        if($pessoa['data_nascimento'] == $dataNascimento){
            $token = md5(time().rand(0,9999).time());
            $novaSenha = md5($novaSenha);

            Login::update()
                ->set('senha',$novaSenha)
                ->where('usuario',$usuario)
            ->execute();

            Pessoa::update()
                ->set('token',$token)
                ->where('id',$pessoa['id'])
            ->execute();

            return $token;
        }else{
            return false;
        }
    }

    public static function getAvatar(){
        $dados = Avatar::select()->get();

        $avatar = [];
        foreach($dados as $dadosItem){
            $newDados = new Avatar();
            $newDados->id = $dadosItem['id'];
            $newDados->nome = ucfirst($dadosItem['nome']);
            $newDados->arquivo = $dadosItem['arquivo'];

            $avatar[] = $newDados;
        }

        return $avatar;
    }

    public static function updateAvatar($token, $id_avatar){

        if($token && $id_avatar){
            Pessoa::update()->set('id_avatar', $id_avatar)->where('token', $token)->execute();
        }

    }


}