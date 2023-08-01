<?php $render('header',['css'=> 'home']); ?>

<div id="titulo">Classificação do Ranking</div>
<section id="lista">
    <div class="nome">Classificação</div>
    <div class="pontos">Pontos</div>
</section>

<?php foreach($pessoa as $dadosItem): ?>
<section class="item">
    <div class="posicao"><?=$dadosItem->ordem;?>º</div>
    <div class="nome">
        <div class="imagem"><img class="avatar" src="<?=$base;?>/img/avatar/<?=$dadosItem->avatar;?>" alt="avatar"></div>
        <div class="apelido"><?=$dadosItem->nome;?></div>
    </div>
    <?php if($dadosItem->ordem == 1): ?>
    <div class="pontos"><img src="img/primeiro.png" alt="primeiro"><?=$dadosItem->acerto;?></div>
    <?php elseif($dadosItem->ordem == 2): ?>
    <div class="pontos"><img src="img/segundo.png" alt="segundo"><?=$dadosItem->acerto;?></div>
    <?php elseif($dadosItem->ordem == 3): ?>
        <div class="pontos"><img src="img/terceiro.png" alt="terceiro"><?=$dadosItem->acerto;?></div>
    <?php else: ?>
    <div class="pontos"><?=$dadosItem->acerto;?></div>
    <?php endif; ?>

</section>
<?php endforeach; ?>

<?php $render('footer'); ?>