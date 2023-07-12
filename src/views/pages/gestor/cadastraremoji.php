<?php $render('header', ['css'=> 'gestorPreCadastro']); ?>

<div id="titulo">Cadastro de Emoji</div>
<div id="alerta">
    <?php if(!empty($flash)): ?>
        <?php echo $flash; ?>
    <?php endif; ?>
</div>
<form action="" method="post">
    <input name="palavra" type="text" placeholder="Nome do emoji" autocomplete="off">
    <input name="arquivo" type="file">
    <select name="turma">
        <option value="">Selecione a emoção</option>
        <option value="feliz">Feliz</option>
        <option value="triste">Triste</option>
    </select>
    <button id="botao">Cadastrar</button>
</form>

<?php $render('footer'); ?>