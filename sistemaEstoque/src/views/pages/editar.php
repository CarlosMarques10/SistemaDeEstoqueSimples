<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="<?=$base;?>/assets/css/addProduto.css">
</head>
<body>

    <div id="AdicionarProduto">
        <div id="AdicionarProdutoh2">
            <h2>Editar Produto</h2>
        </div>
        <div id="AdicionarProdutoForm">
            <form method="post" action="<?=$base;?>/edit/<?=$info['id'];?>">
                <label>
                    <p>Código:</p>
                  <input type="number" name="cod" value="<?=$info['cod'];?>"><br>  
                </label>
                <label>
                    <p>Nome:</p>
                   <input type="text" name="name" value="<?=$info['name'];?>"><br> 
                </label>
                <label>
                    <p>Preço:</p>
                    <input type="text" name="price" value="<?=number_format($info['price'],2,',','.');?>"><br>
                </label>
                <label>
                    <p>Quantidade:</p>
                    <input type="number" name="quantity" value="<?=$info['quantity'];?>"><br>
                </label>
                <label>
                    <p>Quantidade Minima:</p>
                    <input type="number" name="min_quantity" value="<?=$info['min_quantity'];?>"><br>
                </label>
                <input type="submit" value="Enviar">

            </form>

        </div>

    </div>
    
</body>
</html>