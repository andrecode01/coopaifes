<?php 
    
    #   Rotas das página

    $a = 'login';
    $_SESSION['pag'] = $a;
    if(isset($_GET['a'])){
        $a = $_GET['a'];
    }    

    switch ($a) {

        #   WEB GERAL
        case 'home'          :   include_once('webgeral/index.php');     break;
        case 'login'         :   include_once('webgeral/login.php');     break;
        case 'cadastro'      :   include_once('webgeral/cadastro.php');  break;
        case 'busca'         :   include_once('webgeral/busca.php');     break;
        case 'perfil'        :   include_once('webgeral/perfil.php');    break;

        #   BD
        case 'php-menu'      :   include_once('bd/php-bd.php');          break;
        case 'criar-bd'      :   include_once('bd/criar-bd.php');        break;
        case 'criar-tab-usua':   include_once('bd/criar-tab-usua.php');  break;
        case 'criar-tab-coop':   include_once('bd/criar-tab-coop.php');  break;
        case 'inserir-usua'  :   include_once('bd/inserir-usua.php');    break;
        case 'inserir-coop'  :   include_once('bd/inserir-coop.php');    break;
        
        #   SESSÃO
        case 'logout'        :   include_once('sessao/sair-sessao.php'); break;

    }
?>