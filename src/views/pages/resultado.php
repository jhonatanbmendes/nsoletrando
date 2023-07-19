<?php $render('header',['css'=> 'resultado']); ?>
<?php if($correto == 'sim'): ?>
<div id="titulo">Você Acertou. Parabéns!!!</div>
<img id="emoji" src="<?=$base;?>/img/emoji/<?=$emoji->arquivo;?>" alt="emoji">
<?php else: ?>
<div id="titulo">Não foi dessa vez.</div>
<img id="emoji" src="img/emoji/<?=$emoji->arquivo;?>" alt="emoji">
<?php endif; ?>
<section>
    <div class="texto">A Palavra Correta é:</div>
    <div class="palavra"><?=$resposta;?></div>
</section>
<section>
    <div class="texto">Você Escreveu:</div>
    <div class="palavra"><?=$escrita;?></div>
</section>

<div id="botao"><a href="<?=$base;?>/jogo">Proximo Palavra</a></div>

<?php $render('footer'); ?>