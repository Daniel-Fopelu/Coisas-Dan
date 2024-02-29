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
        <form action="./aula6">
            <input type="hidden" name="tabela" value="<?=htmlspecialchars(serialize($tabela))?>">
            <p><input name="logradouro" placeholder="Logradouro"/></p>
            <p><input name="bairro" placeholder="Bairro"/></p>
            <p><input name="numero" placeholder="Número"/></p>
            <p><input name="cidade" placeholder="Cidade"></p>
            <p><input name="uf" placeholder="UF"/></p>
            <p><input name="cep" placeholder="CEP"/></p>
            <p><input type="submit" value="enviar"/></p>
        </form>
        <table>
            <thead>
                <th>Logradouro</th>
                <th>Número</th>
                <th>Cidade</th>
            </thead>
            <tbody>
                <tr>
                <?php foreach($tabela as $e) { ?>
                    <td> <?=$e['logradouro']?> </td>
                    <td> <?=$e['numero']?> </td>
                    <td> <?=$e['cidade']?> </td>
                <?php } ?>
                </tr>
            </tbody>
        </table>
    </body>
</html>