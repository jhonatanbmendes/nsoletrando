<?php
namespace src\handler;

use \src\models\Pessoa;
use \src\models\Perfil;
use \src\models\Serie;
use \src\models\Login;
use \src\models\Avatar;
use \src\models\Emoji;

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

    public static function getSerieId($id){
        $dados = Serie::select()->where('id', $id)->one();

        return $dados;
    }

    public static function addAvatar($nome, $arquivo){
        Avatar::insert([
            'nome' => $nome,
            'arquivo' => $arquivo
        ])->execute();
    }

    public static function addEmoji($nome, $tipo, $arquivo){
        Emoji::insert([
            'nome' => $nome,
            'tipo' => $tipo,
            'arquivo' => $arquivo
        ])->execute();
    }

}