<?php $render('header', ['css'=> 'gestorPreCadastro']); ?>

<div id="titulo">Pré-Cadastro de Usuário</div>
<div id="alerta">
    <?php if(!empty($flash)): ?>
        <?php echo $flash; ?>
    <?php endif; ?>
</div>
<form action="" method="post">
    <input name="nome" type="text" placeholder="Digite o nome" autocomplete="off">
    <select id="perfil" name="perfil" onclick="ocultarSerie()">
        <option value="">Selecione um Perfil</option>
        <?php foreach($perfil as $perfilItem): ?>
            <option value="<?= $perfilItem->id;?>"><?=$perfilItem->nome;?></option>
        <?php endforeach; ?>
    </select>
    <select name="turma">
        <option value="">Selecione a turma</option>
        <?php foreach($serie as $serieItem): ?>
            <option value="<?= $serieItem->id;?>"><?= $serieItem->ano;?>º ano <?= strtoupper($serieItem->turma);?></option>
        <?php endforeach; ?>
    </select>
    <input name="dataNascimento" type="text" placeholder="Digite a Data de Nascimento" id="nascimento">
    <button id="botao">Cadastrar</button>
</form>

<div id="btn">
    <div><a href="<?=$base;?>/gestor/listarprecadastro">Inativar Pré-Cadastro</a></div>
    <div><a href="<?=$base;?>/gestor">Início</a></div>
</div>

<?php $render('footer'); ?>