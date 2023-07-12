<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form method="post" action="<?=$base;?>/cadastro">
        <input type="number" required name="number" placeholder="numero do funcionario"><br>
        <input type="password" name="password" placeholder="senha"><br>
        <input type="submit" value="cadastrar">
    </form>
    
</body>
</html>