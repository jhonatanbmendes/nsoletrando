<?php $render('header', ['css'=> 'gestorPreCadastro']); ?>

<div id="titulo">Cadastro de Palavra</div>
<div id="alerta">
    <?php if(!empty($flash)): ?>
        <?php echo $flash; ?>
    <?php endif; ?>
</div>
<form action="" method="post" enctype="multipart/form-data">
    <input name="palavra" type="text" placeholder="Digite a Palavra" autocomplete="off">
    <input name="arquivo" type="file" accept="audio/mpeg">
    <select name="ano">
        <option value="">Selecione sua turma</option>
        <?php foreach($ano as $anoItem):?>
        <option value="<?=$anoItem;?>"><?=$anoItem;?>º ano</option>
        <?php endforeach;?>
    </select>
    <select name="nivel">
        <option value="">Selecione um nível</option>
        <option value="1">Nível 1</option>
        <option value="2">Nível 2</option>
        <option value="3">Nível 3</option>
        <option value="4">Nível 4</option>
        <option value="5">Nível 5</option>
        <option value="6">Nível 6</option>
        <option value="7">Nível 7</option>
        <option value="8">Nível 8</option>
        <option value="9">Nível 9</option>
        <option value="10">Nível 10</option>
    </select>
    <button id="botao">Cadastrar</button>
</form>

<?php $render('footer'); ?>