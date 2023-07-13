<?php $render('header', ['css'=> 'gestorPreCadastro']); ?>

<div id="titulo">Cadastro de Emoji</div>
<div id="alerta">
    <?php if(!empty($flash)): ?>
        <?php echo $flash; ?>
    <?php endif; ?>
</div>
<form action="" method="post" enctype="multipart/form-data">
    <input name="arquivo" type="file" accept="image/gif">
    <input name="nome" type="text" placeholder="Nome do emoji" autocomplete="off">
    <select name="tipo">
        <option value="">Selecione a emoção</option>
        <option value="feliz">Feliz</option>
        <option value="triste">Triste</option>
    </select>
    <button id="botao">Cadastrar</button>
</form>

<div id="btn">
    <div><a href="<?=$base;?>/gestor/listaremoji">Lista de Emoji</a></div>
    <div><a href="<?=$base;?>/gestor">Início</a></div>
</div>

<?php $render('footer'); ?>