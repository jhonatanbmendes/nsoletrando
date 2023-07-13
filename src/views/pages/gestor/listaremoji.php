<?php $render('header', ['css'=> 'gestorHome']); ?>

<div id="titulo">Lista de Emoji</div>

<div id="btn">
    <div><a href="<?= $base;?>/gestor">Início</a></div>
</div>

<section id="lista">
    <div class="nome">Emoji</div>
    <div class="pontos">Ação</div>
</section>
<?php if(!empty($emoji)):?>
<?php foreach($emoji as $emojiItem):?>
<section class="item">
    <div class="nome">
        <div class="imagem"><img class="avatar" src="<?=$base;?>/img/emoji/<?=$emojiItem->arquivo;?>" alt="emoji"></div>
        <div class="apelido"><?=$emojiItem->nome;?> (<?=$emojiItem->tipo;?>)</div>
    </div>
    <div class="pontos"><a href="<?=$base;?>/gestor/alteraremoji/<?=$emojiItem->id;?>">Editar</a></div>
</section>
<?php endforeach;?>
<?php endif;?>

<?php $render('footer'); ?>