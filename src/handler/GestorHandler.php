<?php
namespace src\handler;

use \src\models\Pessoa;
use \src\models\Perfil;
use \src\models\Serie;
use \src\models\Login;
use \src\models\Avatar;

class GestorHandler {

    public static function getPerfil(){
        $dados = Perfil::select()->where('nome', 'in', ['aluno', 'professor'])->get();

        $perfil = [];
        foreach($dados as $dadosItem){
            $newPerfil = new Perfil();
            $newPerfil->id = $dadosItem['id'];
            $newPerfil->nome = $dadosItem['nome'];

            $perfil[] = $newPerfil;
        }

        return $perfil;
    }

    public static function getSerie(){
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


}