<?php $render('header', ['css'=> 'gestorHome']); ?>

<div id="titulo">Painel Administrativo</div>

<div id="btn">
    <div><a href="#">Pré-Cadastro</a></div>
    <div><a href="#">Cadastrar Palavra</a></div>
</div>
<div id="btn">
    <div><a href="#">Cadastrar Emoji</a></div>
    <div><a href="#">Cadastrar Avatar</a></div>
</div>

<form action="/gestor/home" method="post">
    <input type="text" name="pesquisa" placeholder="Digite o Nome do Aluno">
    <button type="submit"><img src="<?=$base;?>/img/pesquisar.png" alt="Pesquisar"></button>
</form>

<section id="lista">
    <div class="nome">Usuário</div>
    <div class="pontos">Ação</div>
</section>
<?php if(!empty($pessoa)):?>
<?php foreach($pessoa as $pessoaItem):?>
<section class="item">
    <div class="nome">
        <div class="imagem"><img class="avatar" src="<?=$base;?>/img/avatar/<?=$pessoaItem->avatar;?>.png" alt="avatar"></div>
        <div class="apelido"><?=$pessoaItem->nome;?></div>
    </div>
    <div class="pontos"><a href="<?=$pessoaItem->id;?>">Alterar</a></div>
</section>
<?php endforeach;?>
<?php endif;?>
<section class="item">
    <div class="nome">
        <div class="imagem"><img class="avatar" src="<?=$base;?>/img/avatar/avatar3.png" alt="avatar"></div>
        <div class="apelido">Jhonatan - 3º ano A</div>
    </div>
    <div class="pontos"><a href="#">Inativar</a></div>
</section>

<?php $render('footer'); ?>