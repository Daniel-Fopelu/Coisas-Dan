<?php
 $dividas=[
    ['nome'=> 'Água', 'valor'=> 200.1],
    ['nome'=> 'Luz', 'valor'=> 180.33] 
 ];
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <th>nome</th><th>valor</th>
        <tbody>
            <?php foreach ($dividas as $conta) {?>
            <tr>
                <td><?=$conta['nome']?></td>
                <td><?=$conta['valor']?></td>
            </tr>
           <?php } ?>
        </tbody>
    </table>
</body>
</html>