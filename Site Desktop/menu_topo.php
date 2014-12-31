<header>
    
    <div id="top_titulo">
        <a href="index.php">FeedMent</a>
    </div>
    
    <div id="top_user">
        <img id="top_user_img" src="<?php echo mysql_result($busca_dados_user, 0, 'foto'); ?>" />
    </div>
    
</header>

<div id="menu_user">
    <ul>
        <li class="menu_sobre">
            <span>Sobre</span>
        </li>
        
        <li class="menu_ajuda">
            <span>Ajuda</span>
        </li>
        
        <li class="menu_sair">
            <span>Sair</span>
        </li>
        
    </ul>
</div>