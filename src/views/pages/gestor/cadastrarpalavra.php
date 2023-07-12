<?php $render('header', ['css'=> 'gestorPreCadastro']); ?>

<div id="titulo">Cadastro de Palavra</div>
<div id="alerta">
    <?php if(!empty($flash)): ?>
        <?php echo $flash; ?>
    <?php endif; ?>
</div>
<form action="" method="post">
    <input name="palavra" type="text" placeholder="Digite a Palavra" autocomplete="off">
    <input name="arquivo" type="file">
    <select name="turma">
        <option value="">Selecione sua turma</option>
        <option value="3º ano A">3º ano A</option>
        <option value="3º ano B">3º ano B</option>
        <option value="3º ano C">3º ano C</option>
        <option value="3º ano D">3º ano D</option>
        <option value="3º ano E">3º ano E</option>
        <option value="3º ano F">3º ano F</option>
        <option value="3º ano G">3º ano G</option>
        <option value="4º ano A">4º ano A</option>
        <option value="4º ano B">4º ano B</option>
        <option value="4º ano C">4º ano C</option>
        <option value="4º ano D">4º ano D</option>
        <option value="4º ano E">4º ano E</option>
        <option value="4º ano F">4º ano F</option>
        <option value="5º ano A">5º ano A</option>
        <option value="5º ano B">5º ano B</option>
        <option value="5º ano C">5º ano C</option>
        <option value="5º ano D">5º ano D</option>
        <option value="5º ano E">5º ano E</option>
        <option value="5º ano F">5º ano F</option>
    </select>
    <select name="nivel">
        <option value="">Selecione um nível</option>
        <option value="3º ano A">Nível 1</option>
        <option value="3º ano B">Nível 2</option>
        <option value="3º ano C">Nível 3</option>
        <option value="3º ano D">Nível 4</option>
        <option value="3º ano E">Nível 5</option>
        <option value="3º ano F">Nível 6</option>
        <option value="3º ano G">Nível 7</option>
        <option value="4º ano A">Nível 8</option>
        <option value="4º ano B">Nível 9</option>
        <option value="4º ano C">Nível 10</option>
    </select>
    <button id="botao">Cadastrar</button>
</form>

<?php $render('footer'); ?>