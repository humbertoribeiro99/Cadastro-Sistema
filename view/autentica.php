<?php
    //verificar se já existe uma sessao iniciada
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }     
    if(!isset($_SESSION['login'])){
        require('login.php');
        exit;
    }
?>