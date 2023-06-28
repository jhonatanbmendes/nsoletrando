<?php $render('header',['css'=> 'perfil']); ?> 

<!-- Opa, <?=$nome;?> - Perfil

</br><a href="<?=$base;?>/">Voltar</a> -->

<nav>
    <div><a href="<?=$base;?>/">Início</a></div>
    <div><a href="<?=$base;?>/jogo">Jogar</a></div>
    <div><a href="<?=$base;?>/rankingindividual">Meu Ranking</a></div>
</nav>

<div id="titulo">Perfil</div>
<section id="perfil">
    <div>
        <div><img src="<?=$base;?>/img/avatar.png" alt="Avatar" class="avatar"></div>
        <div class="apelido">Jhonatan</div>
    </div>
    <div></div>
</section>
<section id="alterar">
    <div><a href="<?=$base;?>/alterarSenha">Alterar Senha</a></div>
    <div><a href="<?=$base;?>/alterarAvatar">Alterar Avatar</a></div>
</section>

<?php $render('footer'); ?>