<?php $render('headerExterno',['css'=> 'externo']); ?>

<div id="titulo">Resetar Senha</div>
<div id="alerta">
<?php if(!empty($flash)): ?>
    <?php echo $flash; ?>
<?php endif; ?>
</div>
<form action="<?=$base;?>/resetarsenha" method="post">
    <input name="dataNascimento" type="text" placeholder="Digite a Data de Nascimento" id="nascimento">
    <input name="usuario" type="text" placeholder="Digite o usuário" autocomplete="off">
    <input name="novaSenha" type="password" placeholder="Digite a Nova Senha">
    <button id="botao">Confirmar</button>
    <a href="<?=$base;?>/login">Fazer Login</a>
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