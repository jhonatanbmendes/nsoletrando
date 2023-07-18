<?php
namespace src\handler;

use \src\models\Pessoa;
use \src\models\Perfil;
use \src\models\Serie;
use \src\models\Login;
use \src\models\Avatar;
use \src\models\Emoji;
use \src\models\Palavra;

class AlunoHandler {

    public static function getAlunosHome(){
        $dados = Pessoa::select()->where('status','ativo')->orderBy('acerto','desc')->limit(20)->get();
        $perfil = Perfil::select()->where('nome', 'aluno')->one();

        $cont = 1;
        $pessoa = [];
        foreach($dados as $dadosItem){
            if($perfil['id'] == $dadosItem['id_perfil']){
                $newPessoa = new Pessoa();
                $nome = explode(' ',$dadosItem['nome']);
                $newPessoa->nome = $nome[0];
                $newPessoa->acerto = $dadosItem['acerto'];
                $newPessoa->id_perfil = $dadosItem['id_perfil'];
                $ano = Serie::select()->where('id',$dadosItem['id_serie'])->one();
                $newPessoa->serie = $ano['ano'].'º ano '.strtoupper($ano['turma']);
                $avatar = Avatar::select()->where('id',$dadosItem['id_avatar'])->one();
                $newPessoa->avatar = $avatar['arquivo'];
                $newPessoa->ordem = $cont;
                
                $pessoa[] = $newPessoa;
                $cont++;
            }
        }
        return $pessoa;
    }

    public static function getAlunoIndividual(){
        $dados = Pessoa::select()->where('status','ativo')->orderBy('acerto','desc')->limit(20)->get();
        $perfil = Perfil::select()->where('nome', 'aluno')->one();

        $cont = 1;
        $pessoa = [];
        foreach($dados as $dadosItem){
            if($perfil['id'] == $dadosItem['id_perfil']){
                $newPessoa = new Pessoa();
                $nome = explode(' ',$dadosItem['nome']);
                $newPessoa->nome = $nome[0];
                $newPessoa->acerto = $dadosItem['acerto'];
                $newPessoa->id_perfil = $dadosItem['id_perfil'];
                $ano = Serie::select()->where('id',$dadosItem['id_serie'])->one();
                $newPessoa->serie = $ano['ano'].'º ano '.strtoupper($ano['turma']);
                $avatar = Avatar::select()->where('id',$dadosItem['id_avatar'])->one();
                $newPessoa->avatar = $avatar['arquivo'];
                $newPessoa->ordem = $cont;
                
                $pessoa[] = $newPessoa;
                $cont++;
            }
        }
        return $pessoa;
    }



}