<?php $render('headerExterno',['css'=> 'externo']); ?>

<!-- Opa, <?=$nome;?> - Cadastrar

</br><a href="<?=$base;?>/">Voltar</a> -->

<div id="titulo">Cadastro de Aluno</div>
<div id="alerta">
    <?php if(!empty($flash)): ?>
        <?php echo $flash; ?>
    <?php endif; ?>
</div>
<form action="<?=$base;?>/cadastrar" method="post">
    <input name="nome" type="text" placeholder="Digite seu nome" autocomplete="off">
    <select id="perfil" name="perfil" onclick="ocultarSerie()">
        <option value="">Selecione um Perfil</option>
        <?php foreach($perfil as $perfilItem): ?>
            <option value="<?= $perfilItem->id;?>"><?=$perfilItem->nome;?></option>
        <?php endforeach; ?>
        </select>
        <!-- <select name="ano">
            <option value="">Selecione o ano</option>
            <?php foreach($ano as $anoItem): ?>
                <option value="<?= $anoItem;?>"><?= $anoItem;?>º ano</option>
                <?php endforeach; ?>
            </select> -->
            <select name="turma">
                <option value="">Selecione a turma</option>
                <?php foreach($serie as $serieItem): ?>
                    <option value="<?= $serieItem->id;?>"><?= $serieItem->ano;?>º ano <?= strtoupper($serieItem->turma);?></option>
                <?php endforeach; ?>
    </select>
    <input name="dataNascimento" type="text" placeholder="Digite a Data de Nascimento" id="nascimento">
    <input name="usuario" type="text" placeholder="Digite um usuário" autocomplete="off">
    <input name="senha" type="password" placeholder="Digite uma senha">
    <div id="termo">
        <input name="termo" type="checkbox" value="Aqui vai ficar o termo de autorização de uso dos dados para finalizadade deste projeto.">
        <p>Aqui vai ficar o termo de autorização de uso dos dados para finalizadade deste projeto.</p>
    </div>
    <button id="botao">Cadastrar</button>
    <a href="<?=$base;?>/login">Já Tenho Cadastro</a>
</form>


<script src="https://unpkg.com/imask"></script>
<script>
    IMask(
        document.getElementById('nascimento'),
        {
            mask:'00/00/0000'
        }
    )

</script>

<?php $render('footer'); ?>