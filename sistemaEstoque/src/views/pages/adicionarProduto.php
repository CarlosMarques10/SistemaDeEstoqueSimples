<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Produto</title>
    <link rel="stylesheet" href="<?=$base;?>/assets/css/addProduto.css">
</head>
<body>

    <div id="AdicionarProduto">
        <div id="AdicionarProdutoh2">
            <h2>Adicionar Produto</h2>
        </div>
        <div id="AdicionarProdutoForm">
            <div id="msgSession">
                <?=$msg;?>
            </div>
            <form method="post" action="<?=$base;?>/addProduct">
                <input type="number" name="cod" placeholder="Código do produto" required><br>
                <input type="text" name="name" placeholder="Nome do produto" required><br>
                <input type="number" name="price" placeholder="Preço do produto" required><br>
                <input type="number" name="quantity" placeholder="Quantidade" required><br>
                <input type="number" name="min_quantity" placeholder="Quantidade minima" required><br>
                <input type="submit" value="Enviar">

            </form>

        </div>

    </div>
    
</body>
</html>