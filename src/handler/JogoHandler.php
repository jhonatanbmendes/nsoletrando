<?php
namespace src\handler;

use \src\models\Pessoa;
use \src\models\Perfil;
use \src\models\Serie;
use \src\models\Login;
use \src\models\Avatar;
use \src\models\Emoji;
use \src\models\Palavra;

class JogoHandler {

    public static function getAno($id){

        $pessoa = Pessoa::select()->where('id', $id)->one();

        $dados = Serie::select()->where('id', $pessoa['id_serie'])->one();

        return $dados['ano'];
    }

    public static function getPalavras($ano, $remove){
        if($remove === ''){
            if($ano == 1){
                $dados = Palavra::select()->where('serie_ano', $ano)->get();
            }else{
                $dados = Palavra::select()->where('serie_ano', 'in', [$ano, $ano-1])->get();
            }
        }else{
            if($ano == 1){
                $dados = Palavra::select()->where('serie_ano', $ano)->whereNotIn('id', $remove)->get();
            }else{
                $dados = Palavra::select()->where('serie_ano', 'in', [$ano, $ano-1])->whereNotIn('id', $remove)->get();
            }
        }
        
        $palavras = [];
        foreach($dados as $dadosItem){
            $newPalavra = new Palavra();
            $newPalavra->id = $dadosItem['id'];
            // $newPalavra->palavra = $dadosItem['palavra'];
            // $newPalavra->nivel = $dadosItem['nivel'];
            // $newPalavra->serie_ano = $dadosItem['serie_ano'];
            $newPalavra->arquivo = $dadosItem['arquivo'];

            $palavras[] = $newPalavra;
        }
        return $palavras;
    }

    public static function getEmojiFeliz(){
        $dados = Emoji::select()->where('tipo', 'feliz')->get();

        $emoji = [];
        foreach($dados as $dadosItem){
            $newEmoji = new Emoji();
            $newEmoji->id = $dadosItem['id'];
            $newEmoji->nome = $dadosItem['nome'];
            $newEmoji->tipo = $dadosItem['tipo'];
            $newEmoji->arquivo = $dadosItem['arquivo'];

            $emoji[] = $newEmoji;
        }
        return $emoji;
    }
    public static function getEmojiTriste(){
        $dados = Emoji::select()->where('tipo', 'triste')->get();

        $emoji = [];
        foreach($dados as $dadosItem){
            $newEmoji = new Emoji();
            $newEmoji->id = $dadosItem['id'];
            $newEmoji->nome = $dadosItem['nome'];
            $newEmoji->tipo = $dadosItem['tipo'];
            $newEmoji->arquivo = $dadosItem['arquivo'];

            $emoji[] = $newEmoji;
        }
        return $emoji;
    }





}