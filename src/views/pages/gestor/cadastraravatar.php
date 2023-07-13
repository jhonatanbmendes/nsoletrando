<?php $render('header', ['css'=> 'gestorPreCadastro']); ?>

<div id="titulo">Cadastro de Avatar</div>
<div id="alerta">
    <?php if(!empty($flash)): ?>
        <?php echo $flash; ?>
    <?php endif; ?>
</div>
<form action="" method="post" enctype="multipart/form-data">
    <input name="arquivo" type="file" accept="image/png">
    <input name="nome" type="text" placeholder="Nome do avatar" autocomplete="off">
    <button id="botao">Cadastrar</button>
</form>

<?php $render('footer'); ?>