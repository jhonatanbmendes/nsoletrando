<?php $render('header',['css'=> 'rankingIndividual']); ?>

<div id="titulo">Jogadas Esgotadas</div>
<section>
    <div class="frase">Olá <strong><?=$pessoa->nome;?></strong></div>
    <div class="frase">Hoje você completou a missão do dia.</div>
    <div class="frase">Praticou as 30 palavras permitidas.</div>
    <div class="frase">Amanhã o jogo será desbloqueado.</div>
</section>
</br></br></br>
<div id="botao"><a href="<?=$base;?>/">Início</a></div>

<?php $render('footer'); ?>