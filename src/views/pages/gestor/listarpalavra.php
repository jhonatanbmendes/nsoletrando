<?php $render('header', ['css'=> 'gestorHome']); ?>

<div id="titulo">Lista de Emoji</div>

<div id="btn">
    <div><a href="<?= $base;?>/gestor">Início</a></div>
</div>

<div id="link">
    <div><a href="<?= $base;?>/gestor/listarpalavra/1">1º ano</a></div>
    <div><a href="<?= $base;?>/gestor/listarpalavra/2">2º ano</a></div>
    <div><a href="<?= $base;?>/gestor/listarpalavra/3">3º ano</a></div>
    <div><a href="<?= $base;?>/gestor/listarpalavra/4">4º ano</a></div>
    <div><a href="<?= $base;?>/gestor/listarpalavra/5">5º ano</a></div>
</div>

<section id="lista">
    <div class="nome">Emoji</div>
    <div class="pontos">Ação</div>
</section>
<?php if(!empty($palavra)):?>
<?php foreach($palavra as $palavraItem):?>
<section class="item">
    <div class="nome">
        <div class="apelido"><?=$palavraItem->palavra;?> - <?=$palavraItem->ano;?>º ano (nivel: <?=$palavraItem->nivel;?>)</div>
    </div>
    <div class="pontos"><a href="<?=$base;?>/gestor/alterarpalavra/<?=$palavraItem->id;?>">Editar</a></div>
</section>
<?php endforeach;?>
<?php endif;?>

<?php $render('footer'); ?>