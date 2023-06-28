<?php $render('header',['css'=> 'alterarSenha']); ?>

<!-- Opa, <?=$nome;?> - Alterar Senha

</br><a href="<?=$base;?>/">Voltar</a> -->

<nav>
    <div><a href="<?=$base;?>/">Início</a></div>
    <div><a href="<?=$base;?>/jogo">Jogar</a></div>
    <div><a href="<?=$base;?>/rankingindividual">Meu Ranking</a></div>
</nav>

<div id="titulo">Alterar Senha</div>
<section id="senha">
    <section id="perfil">
        <div><img src="<?=$base;?>/img/avatar/avatar8.png" alt="Avatar" class="avatar"></div>
        <div class="apelido">Jhonatan</div>
    </section>
    <form action="" method="post">
        <input type="password" name="" id="" placeholder="Digite sua nova senha">
        <input type="password" name="" id="" placeholder="Repita a nova senha">
        <button>Salvar</button>
    </form>
</section>

<?php $render('footer'); ?>