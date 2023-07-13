<?php $render('header', ['css'=> 'gestorPreCadastro']); ?>

<div id="titulo">Alterar Palavra</div>

<div><?=$palavra['palavra'];?></div>
<div>Ano: <?=$palavra['serie_ano'];?></div>
<div>Nível: <?=$palavra['nivel'];?></div>
<audio controls>
    <source src="<?=$base;?>/media/<?=$palavra['arquivo'];?>" type="audio/mpeg">
</audio>


<?php $render('footer'); ?>