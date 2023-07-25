<?php $render('headerExterno',['css'=> 'externo']); ?>

<div id="titulo">Login</div>
<div id="alerta">
<?php if(!empty($flash)): ?>
    <?php echo $flash; ?>
<?php endif; ?>
</div>
<form action="<?=$base;?>/login" method="post">
    <input name="usuario" type="text" onfocus="true" placeholder="Nome de Usuário" autocomplete="off">
    <input name="senha" type="password" placeholder="Senha">
    <button id="botao">Entrar</button>
    <a href="<?=$base;?>/resetarsenha">Esqueci minha Senha</a>
    <a href="<?=$base;?>/chave">Não sou Cadastrado</a>
</form>

<?php $render('footer'); ?>