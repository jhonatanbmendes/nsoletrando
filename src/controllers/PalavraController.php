<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Palavra;
use \src\models\Ranking;
use \src\models\Pessoa;
use \src\models\Contagem;
use \src\handler\LoginHandler;
use \src\handler\JogoHandler;

class PalavraController extends Controller {
    
    private $usuarioLogado;

    public function __construct(){
        $this->$usuarioLogado = LoginHandler::checkLogin();
        if(LoginHandler::checkLogin() === false){
            $this->redirect('/login');
        }
    }

    public function jogo(){

        $qtdJogadas = 30;
        $usadas;

        date_default_timezone_set('America/Manaus');
        $dataAtual = Date("Y-m-d", time());

        $contagem = Contagem::select()->where('id_pessoa', $this->$usuarioLogado->id)->one();
        if($contagem['usadas'] != null){
            $usadas = explode(',',$contagem['usadas']);
        }else{
            $usadas = '';
        }

        if($dataAtual === $contagem['data']){
            if(!($contagem['jogadas'] < $qtdJogadas)){
                $this->redirect('/esgotado');
            }
        }else{
            Contagem::update()
                ->set(['data' => $dataAtual, 'jogadas' => 0, 'usadas' => ''])
                ->where('id_pessoa', $this->$usuarioLogado->id)
            ->execute();
        }

        $ano = JogoHandler::getAno($this->$usuarioLogado->id);
        $palavra = JogoHandler::getPalavras($ano,$usadas);
        $indice = array_rand($palavra, 1);

        $this->render('jogo', ['palavra'=> $palavra[$indice]]);
    }

    public function jogoAction(){

        $id = filter_input(INPUT_POST,'id');
        $campo1 = filter_input(INPUT_POST,'campo1');
        $campo2 = filter_input(INPUT_POST,'campo2');
        $campo3 = filter_input(INPUT_POST,'campo3');
        $campo4 = filter_input(INPUT_POST,'campo4');
        $campo5 = filter_input(INPUT_POST,'campo5');
        $campo6 = filter_input(INPUT_POST,'campo6');
        $campo7 = filter_input(INPUT_POST,'campo7');
        $campo8 = filter_input(INPUT_POST,'campo8');
        $campo9 = filter_input(INPUT_POST,'campo9');
        $campo10 = filter_input(INPUT_POST,'campo10');
        $campo11 = filter_input(INPUT_POST,'campo11');
        $campo12 = filter_input(INPUT_POST,'campo12');
        $campo13 = filter_input(INPUT_POST,'campo13');
        $campo14 = filter_input(INPUT_POST,'campo14');
        $campo15 = filter_input(INPUT_POST,'campo15');
        
        $palavra = $campo1.$campo2.$campo3.$campo4.$campo5.$campo6.$campo7.$campo8.$campo9.$campo10.$campo11.$campo12.$campo13.$campo14.$campo15;
        
        $palavra = strtolower($palavra);

        $resposta = Palavra::select()->where('id', $id)->one();

        $emojiFeliz = JogoHandler::getEmojiFeliz();
        $emojiTriste = JogoHandler::getEmojiTriste();
        $auxFeliz = array_rand($emojiFeliz, 1);
        $auxTriste = array_rand($emojiTriste, 1);

        date_default_timezone_set('America/Manaus');
        $dataTempo = Date("Y-m-d h:i:s", time());

        if($palavra === $resposta['palavra']){

            Ranking::insert([
                'resultado' => 'acertou',
                'data' => $dataTempo,
                'id_palavra' => $id,
                'id_pessoa' => $this->$usuarioLogado->id
            ])->execute();

            $soma = Pessoa::select()->where('id',$this->$usuarioLogado->id)->one();

            Pessoa::update()
                ->set('acerto',$soma['acerto'] + 1)
                ->where('id',$this->$usuarioLogado->id)
            ->execute();

            $contagem = Contagem::select()->where('id_pessoa', $this->$usuarioLogado->id)->one();
            if($contagem['usadas'] == null){
                Contagem::update()
                ->set(['usadas' => $resposta['id']])
                ->where('id_pessoa', $this->$usuarioLogado->id)
            ->execute();
            }else{
                Contagem::update()
                ->set(['usadas' => $contagem['usadas'].','.$resposta['id']])
                ->where('id_pessoa', $this->$usuarioLogado->id)
            ->execute();
            }
            Contagem::update()->set(['jogadas' => intval($contagem['jogadas'])+1])->where('id_pessoa', $this->$usuarioLogado->id)->execute();
            
            $this->render('resultado',['escrita'=>$palavra,'resposta'=>$resposta['palavra'], 'correto' => 'sim', 'emoji' => $emojiFeliz[$auxFeliz]]);
        }else{

            Ranking::insert([
                'resultado' => 'errou',
                'palavra_escrita' => $palavra,
                'data' => $dataTempo,
                'id_palavra' => $id,
                'id_pessoa' => $this->$usuarioLogado->id
            ])->execute();

            $soma = Pessoa::select()->where('id',$this->$usuarioLogado->id)->one();

            Pessoa::update()
                ->set('erro',$soma['erro'] + 1)
                ->where('id',$this->$usuarioLogado->id)
            ->execute();

            $contagem = Contagem::select()->where('id_pessoa', $this->$usuarioLogado->id)->one();
            if($contagem['usadas'] == null){
                Contagem::update()
                ->set(['usadas' => $resposta['id']])
                ->where('id_pessoa', $this->$usuarioLogado->id)
            ->execute();
            }else{
                Contagem::update()
                ->set(['usadas' => $contagem['usadas'].','.$resposta['id']])
                ->where('id_pessoa', $this->$usuarioLogado->id)
            ->execute();
            }
            Contagem::update()->set(['jogadas' => intval($contagem['jogadas'])+1])->where('id_pessoa', $this->$usuarioLogado->id)->execute();

            $this->render('resultado',['escrita'=>$palavra,'resposta'=>$resposta['palavra'], 'correto' => 'não', 'emoji' => $emojiTriste[$auxTriste]]);
        }
    }

    public function resultado(){
        $this->render('resultado');
    }

    public function jogoEsgotado(){
        $this->render('esgotado', ['pessoa'=> $this->$usuarioLogado]);
    }


}