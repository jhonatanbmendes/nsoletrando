<?php $render('header',['css'=> 'rankingIndividual']); ?>

<nav>
    <div><a href="<?=$base;?>/">Início</a></div>
    <div><a href="<?=$base;?>/jogo">Jogar</a></div>
    <div><a href="<?=$base;?>/perfil">Perfil</a></div>
</nav>

<div id="titulo">Ranking Individual</div>
<section>
    <div class="frase">Olá <strong><?=$pessoa->nome;?></strong></div>
    <div class="frase">Você já conquistou</div>
    <div id="ponto"><?=$pessoa->acerto;?></div>
    <div class="frase">Pontos</div>
</section>

<?php $render('footer'); ?>