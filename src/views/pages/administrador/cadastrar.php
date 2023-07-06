<?php $render('header', ['css'=> 'admCadastrar']); ?>

<div id="titulo">Pré-Cadastro de Gestores</div>
<div id="alerta">
    <?php if(!empty($flash)): ?>
        <?php echo $flash; ?>
    <?php endif; ?>
</div>
<form action="<?=$base?>/administrador/cadastrar" method="post">
    <input name="nome" type="text" placeholder="Digite o nome" autocomplete="off">
    <input name="dataNascimento" type="text" placeholder="Digite a Data de Nascimento" id="nascimento">
    <button id="botao">Cadastrar</button>
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