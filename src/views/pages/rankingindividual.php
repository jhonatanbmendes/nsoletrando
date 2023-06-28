<?php $render('header',['css'=> 'rankingIndividual']); ?>

<!-- Opa, <?=$nome;?> - Ranking Individual

</br><a href="<?=$base;?>/">Voltar</a> -->

<nav>
    <div><a href="<?=$base;?>/">Início</a></div>
    <div><a href="<?=$base;?>/jogo">Jogar</a></div>
    <div><a href="<?=$base;?>/perfil">Perfil</a></div>
</nav>

<div id="titulo">Ranking Individual</div>
<section>
    <div class="frase">Olá Jhonatan Barbosa Mendes</div>
    <div class="frase">Você já conquistou</div>
    <div id="ponto">23</div>
    <div class="frase">Pontos</div>
</section>

<?php $render('footer'); ?>