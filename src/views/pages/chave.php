<?php $render('headerExterno',['css'=> 'externo']); ?>

<div id="titulo">Validação da Chave de Acesso</div>
<div id="alerta">
    <?php if(!empty($flash)): ?>
        <?php echo $flash; ?>
    <?php endif; ?>
</div>

<form action="<?=$base;?>/chave" method="post">
    <input name="chave" type="text" placeholder="Informe sua Chave de Acesso" autocomplete="off">
    <button id="botao">Validar</button>
    <a href="<?=$base;?>/login">Já Tenho Cadastro</a>
</form>

<?php $render('footer'); ?>