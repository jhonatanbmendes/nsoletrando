<?php $render('headerExterno',['css'=> 'externo']); ?>

<div id="titulo">Cadastro de <?=$titulo;?></div>
<div id="alerta">
    <?php if(!empty($flash)): ?>
        <?php echo $flash; ?>
    <?php endif; ?>
</div>
<form action="" method="post">
<?php foreach($precadastro as $dadosItem): ?>
    <input name="id" type="hidden" value="<?=$dadosItem->id;?>">
    <input name="nome" type="text" value="<?=$dadosItem->nome;?>" disabled>
    <input name="perfil" type="text" value="<?=$dadosItem->perfil;?>" disabled>
    <input name="turma" type="text" value="<?=$dadosItem->serie;?>" disabled>
    <input name="dataNascimento" type="text" value="<?=$dadosItem->dataNascimento;?>" disabled>
<?php endforeach; ?>
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