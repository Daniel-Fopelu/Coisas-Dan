<?php
 $dividas=[
    ['nome'=> 'Água', 'valor'=> 200.1],
    ['nome'=> 'Luz', 'valor'=> 180.33],
    ['nome'=> 'Internet', 'valor'=> 98.95]
 ];
 $total
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="cadastro.php" method="post">
        <input name="nome" placeholder="nome">
        <input type="number" name="valor" placeholder="valor">
        <input type="submit" value="enviar">
        <input type="reset" value="limpar">
    </form>
    <table>
        <thead>
            <th>N</th>
            <th>nome</th>
            <th>valor</th>
        </thead>
        <tbody>
            <?php foreach ($dividas as $index => $conta) {
                $total=$total+$conta('valor')?>
            <tr>
                <td><?php echo $index + 1; ?></td>
                <td><?=$conta['nome']?></td>
                <td>R$ <?=number_format($conta['valor'], 2, ',', '.'); ?></td>
            </tr>
                
           <?php } ?>
        </tbody>
    </table>
</body>
</html>