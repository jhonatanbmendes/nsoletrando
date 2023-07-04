<?php $render('header',['css'=> 'perfil']); ?> 

<nav>
    <div><a href="<?=$base;?>/">Início</a></div>
    <div><a href="<?=$base;?>/jogo">Jogar</a></div>
    <div><a href="<?=$base;?>/rankingindividual">Meu Ranking</a></div>
</nav>

<div id="titulo">Perfil</div>
<section id="perfil">
    <div>
        <div><img src="<?=$base;?>/img/avatar/<?=$pessoa->avatar;?>.png" alt="Avatar" class="avatar"></div>
        <div class="apelido"><?=$pessoa->nome;?></div>
    </div>
    <div></div>
</section>
<section id="alterar">
    <div><a href="<?=$base;?>/alterarSenha">Alterar Senha</a></div>
    <div><a href="<?=$base;?>/alterarAvatar">Alterar Avatar</a></div>
</section>

<?php $render('footer'); ?>