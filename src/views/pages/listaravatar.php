<?php $render('headerExterno',['css'=> 'escolherAvatar']); ?>

<div id="titulo">Escolha seu Avatar</div>

<section>
    <?php foreach($avatar as $dadosItem): ?>
        <a href="<?=$base;?>/escolheravatar/<?=$dadosItem->id;?>"><img src="<?=$base;?>/img/avatar/<?=$dadosItem->arquivo;?>" alt="<?=$dadosItem->id;?>"></a>
    <?php endforeach; ?>
</section>
    
    <?php $render('footer'); ?>