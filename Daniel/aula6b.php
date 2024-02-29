<?php
    $tabela = (isset($_GET['tabela'])) ? unserialize($_GET['tabela']) : [] ;

    if(isset($_GET['logradouro'])) {
    $novo = [];
    $novo["logradouro"] = $_GET["logradouro"];
    $novo["bairro"] = $_GET["bairro"] ?? "";
    $novo["numero"] = $_GET["numero"] ?? "";
    $novo["cidade"] = $_GET["cidade"] ?? "";
    $novo["uf"] = $_GET["uf"] ?? "";
    $novo["cep"] = $_GET["cep"] ?? "";

    $tabela[] = $novo;
   } ?>
<html>
    <body>
        <form action="./aula6b">
            <input type="hidden" name="tabela" value="<?=htmlspecialchars(serialize($tabela))?>">
            <p><input name="logradouro" placeholder="Logradouro"/></p>
            <p><input name="bairro" placeholder="Bairro"/></p>
            <p><input name="numero" placeholder="Número"/></p>
            <p><input name="cidade" placeholder="Cidade"></p>
            <p><input name="uf" placeholder="UF"/></p>
            <p><input name="cep" placeholder="CEP"/></p>
            <p><input type="submit" value="enviar"/></p>
        </form>
    <?php foreach($tabela as $e) { ?>
        <p> Logradouro: <?=$e['logradouro']?> </p>
        <p> Bairro: <?=$e['bairro']?> </p>
        <p> Número: <?=$e['numero']?> </p>
        <p> Cidade: <?=$e['cidade']?> </p>
        <p> UF: <?=$e['uf']?> </p>
        <p> CEP: <?=$e['cep']?> </p>
    <?php } ?>
</body>
</html>