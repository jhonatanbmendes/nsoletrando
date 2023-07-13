<?php $render('header', ['css'=> 'gestorHome']); ?>

<div id="titulo">Lista de Avatar</div>

<div id="btn">
    <div><a href="<?= $base;?>/gestor">Início</a></div>
</div>

<section id="lista">
    <div class="nome">Avatar</div>
    <div class="pontos">Ação</div>
</section>
<?php if(!empty($avatar)):?>
<?php foreach($avatar as $avatarItem):?>
<section class="item">
    <div class="nome">
        <div class="imagem"><img class="avatar" src="<?=$base;?>/img/avatar/<?=$avatarItem->arquivo;?>" alt="avatar"></div>
        <div class="apelido"><?=$avatarItem->nome;?></div>
    </div>
    <div class="pontos"><a href="<?=$base;?>/gestor/alteraravatar/<?=$avatarItem->id;?>">Editar</a></div>
</section>
<?php endforeach;?>
<?php endif;?>

<?php $render('footer'); ?>