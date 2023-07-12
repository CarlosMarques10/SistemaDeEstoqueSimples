
<header>
    <div id="header">
        <div id="headerLeft">
            <a href="<?=$base;?>/addProduct">Adicionar Produto</a>    
            <a href="<?=$base;?>/report">Relatorio</a>
        </div>
            
        <div id="headerRight">
            <p>Funcionario: </p>
            <p><?=$loggedUser->getNumber();?></p>
            <a href="<?=$base;?>/sair">Sair</a>
        </div>
    </div>
</header>