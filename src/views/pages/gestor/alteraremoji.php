<?php $render('header', ['css'=> 'gestorPreCadastro']); ?>

<div id="titulo">Alterar Emoji</div>

<div><?=$emoji['nome'];?></div>
<img src="<?=$base;?>/img/emoji/<?=$emoji['arquivo'];?>">

<?php $render('footer'); ?>