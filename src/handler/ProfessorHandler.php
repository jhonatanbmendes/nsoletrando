<?php
namespace src\handler;

use \src\models\Pessoa;
use \src\models\Perfil;
use \src\models\Serie;
use \src\models\Login;
use \src\models\Avatar;
use \src\models\Emoji;
use \src\models\Palavra;

class ProfessorHandler {

    public static function getAlunoTurma($turma){
        $perfil = Perfil::select()->where('nome', 'aluno')->one();
        $dados = Pessoa::select()->where('id_serie', $turma)->where('id_perfil', $perfil['id'])->orderBy('acerto','desc')->get();

        $cont = 1;
        $pessoa = [];
        foreach($dados as $dadosItem){
            if($perfil['id'] == $dadosItem['id_perfil']){
                $newPessoa = new Pessoa();
                // $nome = explode(' ',$dadosItem['nome']);
                // $newPessoa->nome = $nome[0];
                $newPessoa->nome = $dadosItem['nome'];
                $newPessoa->acerto = $dadosItem['acerto'];
                $newPessoa->id_perfil = $dadosItem['id_perfil'];
                // $ano = Serie::select()->where('id',$dadosItem['id_serie'])->one();
                // $newPessoa->serie = $ano['ano'].'º ano '.strtoupper($ano['turma']);
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