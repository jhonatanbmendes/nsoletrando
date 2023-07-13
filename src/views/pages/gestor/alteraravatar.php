<?php $render('header', ['css'=> 'gestorPreCadastro']); ?>

<div id="titulo">Alterar Avatar</div>

<div><?=$avatar['nome'];?></div>
<img src="<?=$base;?>/img/avatar/<?=$avatar['arquivo'];?>">

<?php $render('footer'); ?>