<?php $render('header',['css'=> 'alterarAvatar']); ?>

<!-- Opa, <?=$nome;?> - Alterar Avatar

</br><a href="<?=$base;?>/">Voltar</a> -->

<div id="titulo">Escolha seu Avatar</div>

<form action="" method="post">
    <input type="image" src="<?=$base;?>/img/avatar/avatar1.png" alt="avatar">
    <input type="image" src="<?=$base;?>/img/avatar/avatar2.png" alt="avatar">
    <input type="image" src="<?=$base;?>/img/avatar/avatar3.png" alt="avatar">
    <input type="image" src="<?=$base;?>/img/avatar/avatar4.png" alt="avatar">
    <input type="image" src="<?=$base;?>/img/avatar/avatar5.png" alt="avatar">
    <input type="image" src="<?=$base;?>/img/avatar/avatar6.png" alt="avatar">
    <input type="image" src="<?=$base;?>/img/avatar/avatar7.png" alt="avatar">
    <input type="image" src="<?=$base;?>/img/avatar/avatar8.png" alt="avatar">
    <input type="image" src="<?=$base;?>/img/avatar/avatar9.png" alt="avatar">
</form>

<?php $render('footer'); ?>