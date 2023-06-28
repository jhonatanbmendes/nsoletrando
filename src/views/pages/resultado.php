<?php $render('header',['css'=> 'resultado']); ?>

<!-- Opa, <?=$nome;?> - Resultado

</br><a href="<?=$base;?>/">Voltar</a> -->

<div id="titulo">Você Acertou. Parabéns!!!</div>
<!-- <div id="titulo">Não foi dessa vez.</div> -->

<img id="emoji" src="<?=$base;?>/img/emoji/acertou1.gif" alt="emoji">
<!-- <img id="emoji" src="img/emoji/errou11.gif" alt="emoji"> -->

<section>
    <div class="texto">A Palavra Correta é:</div>
    <div class="palavra">POSSÍVEL</div>
</section>
<section>
    <div class="texto">Você Escreveu:</div>
    <div class="palavra">POSSÍVEL</div>
</section>

<div id="botao"><a href="<?=$base;?>/jogo">Proximo Palavra</a></div>

<?php $render('footer'); ?>