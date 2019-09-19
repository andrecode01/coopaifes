<?php
    // ========================================
    // index da página web
    // ========================================    
    
    //controlo de sessão
    session_start();
    if(!isset($_SESSION['a'])){
        $_SESSION['a'] = 'inicio';
    }    
    
    date_default_timezone_set('America/Sao_Paulo');
    
    include_once('_cab.php');
    
    include_once('barra_usuario.php');
    
    include_once('routes.php');
    
    include_once('_rod.php');
?>