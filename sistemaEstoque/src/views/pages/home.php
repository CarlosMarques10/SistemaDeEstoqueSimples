<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Estoque</title>
    <link rel="stylesheet" href="<?=$base;?>/assets/css/home.css">
    <link rel="stylesheet" href="<?=$base;?>/assets/css/header.css">
</head>
<body>

    <?php $render('header', ['loggedUser' => $loggedUser]);?> 

    

    <div id="tabela">

        <div id="barraPesquisa">
            <form method="get" action="<?=$base;?>/search">
                <input type="text" name="search" placeholder="Digite o código ou nome do produto" id="search">
                <input type="submit" value="Atualizar">
            </form>
        </div>

        <table>
            <tr>
                <th>CÓDIGO</th>
                <th>NOME</th>
                <th>PREÇO</th>
                <th>QUANTIDADE</th>
                <th>EDITAR</th>
            </tr>
            <?php foreach($info as $item): ?>
                <tr>
                    <td><?=$item['cod'];?></td>
                    <td><?=$item['name'];?></td>
                    <td>R$ <?= number_format($item['price'],2,',','.');?></td>
                    <td><?=$item['quantity'];?></td>
                    <td>
                        <a href="<?=$base;?>/edit/<?=$item['id'];?>">Editar</a>
                    </td>
                </tr>
            <?php endforeach;?>
            

        </table>
    </div>
    
    <script src="<?=$base;?>/assets/js/script.js"></script>
</body>
</html>