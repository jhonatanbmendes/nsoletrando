<?php
namespace src\handler;

use \src\models\Pessoa;
use \src\models\Perfil;
use \src\models\Serie;
use \src\models\Login;
use \src\models\Avatar;
use \src\models\Emoji;
use \src\models\Palavra;

class GestorHandler {

    public static function getPerfil(){
        $dados = Perfil::select()->where('nome', 'in', ['aluno', 'professor'])->get();

        $perfil = [];
        foreach($dados as $dadosItem){
            $newPerfil = new Perfil();
            $newPerfil->id = $dadosItem['id'];
            $newPerfil->nome = ucfirst($dadosItem['nome']);

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
            'nome' => strtolower($nome),
            'arquivo' => $arquivo
        ])->execute();
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

    public static function UpdateAvatar($id){
        $dados = Avatar::select()->where('id', $id)->one();
        if($dados){
            return $dados;
        }
        return false;
    }

    public static function addEmoji($nome, $tipo, $arquivo){
        Emoji::insert([
            'nome' => strtolower($nome),
            'tipo' => strtolower($tipo),
            'arquivo' => $arquivo
        ])->execute();
    }

    public static function getEmoji(){
        $dados = Emoji::select()->get();

        $emoji = [];
        foreach($dados as $dadosItem){
            $newDados = new Emoji();
            $newDados->id = $dadosItem['id'];
            $newDados->nome = ucfirst($dadosItem['nome']);
            $newDados->tipo = ucfirst($dadosItem['tipo']);
            $newDados->arquivo = $dadosItem['arquivo'];

            $emoji[] = $newDados;
        }

        return $emoji;
    }

    public static function UpdateEmoji($id){
        $dados = Emoji::select()->where('id', $id)->one();
        if($dados){
            return $dados;
        }
        return false;
    }

    public static function addPalavra($palavra, $newNome, $ano, $nivel){
        Palavra::insert([
            'palavra' => strtolower($palavra),
            'nivel' => $nivel,
            'serie_ano' => $ano,
            'arquivo' => $newNome
        ])->execute();
    }

    public static function getPalavra(){
        $dados = Palavra::select()->orderBy('id','desc')->limit(20)->get();

        $palavra = [];
        foreach($dados as $dadosItem){
            $newDados = new Emoji();
            $newDados->id = $dadosItem['id'];
            $newDados->palavra = ucfirst($dadosItem['palavra']);
            $newDados->nivel = $dadosItem['nivel'];
            $newDados->ano = $dadosItem['serie_ano'];
            $newDados->arquivo = $dadosItem['arquivo'];

            $palavra[] = $newDados;
        }

        return $palavra;
    }

    public static function getPalavraAno($ano){
        $dados = Palavra::select()->where('serie_ano', $ano)->orderBy('nivel')->get();

        $palavra = [];
        foreach($dados as $dadosItem){
            $newDados = new Emoji();
            $newDados->id = $dadosItem['id'];
            $newDados->palavra = ucfirst($dadosItem['palavra']);
            $newDados->nivel = $dadosItem['nivel'];
            $newDados->ano = $dadosItem['serie_ano'];
            $newDados->arquivo = $dadosItem['arquivo'];

            $palavra[] = $newDados;
        }

        return $palavra;
    }

    public static function UpdatePalavra($id){
        $dados = Palavra::select()->where('id', $id)->one();
        if($dados){
            return $dados;
        }
        return false;
    }





}