<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatorio</title>
    <link rel="stylesheet" href="<?=$base;?>/assets/css/relatorio.css">
    <link rel="stylesheet" href="<?=$base;?>/assets/css/header.css">
</head>
<body>

    <?php $render('header',['loggedUser' => $loggedUser]);?>

    <div id="tabela">
        <button id="imprimir">Imprimir Relatorio</button>
            <table>
                <tr>
                    <th>NOME</th>
                    <th>QUANTIDADE</th>
                    <th>QUANTIDADE MINIMA</th>
                    <th>REPOSIÇÃO</th>
                </tr>
                <?php foreach($list as $item): ?>
                    <tr>
                        <td><?=$item['name'];?></td>
                        <td><?=$item['quantity'];?></td>
                        <td><?=$item['min_quantity'];?></td>
                        <td><?=floatval($item['min_quantity']) - floatval($item['quantity']);?></td>
                    </tr>
                <?php endforeach;?>
                

            </table>
        </div>
    
        <script src="<?=$base;?>/assets/js/script.js"></script>
</body>
</html>