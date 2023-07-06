<?php $render('header', ['css'=> 'admHome']); ?>

<div id="titulo">Administração de Gestores</div>

<div id="btn">
    <div><a href="<?= $base;?>/administrador/cadastrar">Cadastrar Gestor</a></div>
    <div><a href="<?= $base;?>/administrador/precadastro">Lista de Pré-Cadastro</a></div>
</div>

<section id="lista">
    <div class="nome">Gestores</div>
    <div class="pontos">Ação</div>
</section>
<?php if(!empty($gestor)):?>
<?php foreach($gestor as $gestorItem):?>
<section class="item">
    <div class="nome">
        <div class="imagem"><img class="avatar" src="<?=$base;?>/img/avatar/<?=$gestorItem->avatar;?>.png" alt="avatar"></div>
        <div class="apelido"><?=$gestorItem->nome?></div>
    </div>
    <div class="pontos"><a href="#">Inativar</a></div>
</section>
<?php endforeach;?>
<?php endif;?>

<?php $render('footer'); ?>