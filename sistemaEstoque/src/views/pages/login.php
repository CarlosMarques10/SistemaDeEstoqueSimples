<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?=$base;?>/assets/css/login.css">
</head>
<body>

    <div id="containerLogin">
       
        <div id="login">
            <div id="loginText">Faça o Login</div>
            <?php
                if(!empty($flash)): ?>
                <div id="flash"><?=$flash;?></div>
            <?php endif;?>

                
            
            <form action="<?=$base;?>/login" method="post">
                <input type="number" required name="number" placeholder="Digite seu numero" class="loginInput"><br>
                <input type="password" required name="password" placeholder="Digite sua senha" class="loginInput"><br>
                <input type="submit" value="Entrar" id="btnEntrar">
            </form>
        </div>
    </div>
    
</body>
</html>