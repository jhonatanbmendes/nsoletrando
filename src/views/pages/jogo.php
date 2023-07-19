<?php $render('header',['css'=> 'jogo']); ?>

<!-- Opa, <?=$nome;?> - Jogo

</br><a href="<?=$base;?>/">Voltar</a> -->

<nav>
    <div><a href="<?=$base;?>/">Início</a></div>
    <div><a href="<?=$base;?>/rankingindividual">Meu Ranking</a></div>
    <div><a href="<?=$base;?>/perfil">Perfil</a></div>
</nav>

<form action="" method="post" name="palavra">
    <div class="palavra">Aperte Play para Ouvir a Palavra</div>
    <audio controls>
        <source src="<?=$base;?>/media/<?=$palavra->arquivo;?>" type="audio/mpeg">
    </audio>
    <div class="frase">Soletre a Palavra nos Campos Abaixo</div>
    <section>
        <input name="id" value="<?=$palavra->id;?>" hidden>
        <input type="text" maxlength="1" name="campo1" onkeyUp="javascript:jumpto('campo1','campo2')" class="letra" autocomplete="off" required>
        <input type="text" maxlength="1" name="campo2" onkeyUp="javascript:jumpto('campo2','campo3')" class="letra" autocomplete="off" required>
        <input type="text" maxlength="1" name="campo3" onkeyUp="javascript:jumpto('campo3','campo4')" class="letra" autocomplete="off">
        <input type="text" maxlength="1" name="campo4" onkeyUp="javascript:jumpto('campo4','campo5')" class="letra" autocomplete="off">
        <input type="text" maxlength="1" name="campo5" onkeyUp="javascript:jumpto('campo5','campo6')" class="letra" autocomplete="off">
        <input type="text" maxlength="1" name="campo6" onkeyUp="javascript:jumpto('campo6','campo7')" class="letra" autocomplete="off">
        <input type="text" maxlength="1" name="campo7" onkeyUp="javascript:jumpto('campo7','campo8')" class="letra" autocomplete="off">
        <input type="text" maxlength="1" name="campo8" onkeyUp="javascript:jumpto('campo8','campo9')" class="letra" autocomplete="off">
        <input type="text" maxlength="1" name="campo9" onkeyUp="javascript:jumpto('campo9','campo10')" class="letra" autocomplete="off">
        <input type="text" maxlength="1" name="campo10" onkeyUp="javascript:jumpto('campo10','campo11')" class="letra" autocomplete="off">
        <input type="text" maxlength="1" name="campo11" onkeyUp="javascript:jumpto('campo11','campo12')" class="letra" autocomplete="off">
        <input type="text" maxlength="1" name="campo12" onkeyUp="javascript:jumpto('campo12','campo13')" class="letra" autocomplete="off">
        <input type="text" maxlength="1" name="campo13" onkeyUp="javascript:jumpto('campo13','campo14')" class="letra" autocomplete="off">
        <input type="text" maxlength="1" name="campo14" onkeyUp="javascript:jumpto('campo14','campo15')" class="letra" autocomplete="off">
        <input type="text" maxlength="1" name="campo15" class="letra" autocomplete="off" style="text-transform: uppercase;" >
    </section>
    <button id="botao">Corrigir</button>
</form>

<script type="text/javascript">
    function jumpto(campoatual, proxcampo){
        var tamanho_max = eval("document.palavra." + campoatual + ".maxLength");
        var tamanho_atual = eval("document.palavra." + campoatual + ".value.length;");
        if(tamanho_atual = tamanho_max){
            eval("document.palavra."+proxcampo+".focus();");
        }
    }
</script>

<?php $render('footer'); ?>