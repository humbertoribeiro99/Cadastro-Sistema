<?php

/**
 * Carrega as classes automaticamente
 */
include_once 'autoload.php';

/**
 * Ativar segurança
 */
new Secure();

/**
 * Verifica qual link
 */
$link = explode('?', $_SERVER['REQUEST_URI']);

/**
 * Login
 */
if ($link[1] == 'login') {
    $_SESSION['menu'] = 'login';
    header("location: index.php");
}

/**
 * Principal
 */
if ($link[1] == 'principal') {
    $_SESSION['menu'] = 'principal';
    header("location: index.php");
}

/**
 * Cliente
 */
if ($link[1] == 'index') {
    $_SESSION['menu'] = 'index';
    header("location: index.php");
}

/**
 * Formulario
 */
if ($link[1] == 'form') {
    $_SESSION['menu'] = 'form';
    header("location: index.php");
}

/**
 * Formulario
 */
if ($link[1] == 'cadastro') {
    $_SESSION['menu'] = 'cadastro';
    header("location: index.php");
}

/**
 * Formulario
 */
if ($link[1] == 'registre') {
    $_SESSION['menu'] = 'registre';
    header("location: index.php");
}

/**
 * Formulario
 */
if ($link[1] == 'welcome') {
    $_SESSION['menu'] = 'welcome';
    header("location: index.php");
}
/**
 * Formulario
 */
if ($link[1] == 'logout') {
    $_SESSION['menu'] = 'logout';
    header("location: index.php");
}
/**
 * Formulario
 */
if ($link[1] == 'reset') {
    $_SESSION['menu'] = 'reset';
    header("location: index.php");
}

/**
 * Redirecionar
 */
switch ($_SESSION['menu']) {
    /**
     * Login
     */
    case 'login':
        include 'view/login.php';
        break;

    /**
     * Login
     */
    case 'principal':
        include 'view/principal.php';
        break;

    /**
     * Cliente
     */
    case 'index':
        include 'view/index.php';
        break;

        /**
     * Formulario
     */
    case 'form':
        include 'view/form.php';
        break;

          /**
     * Formulario
     */
    case 'cadastro':
        include 'view/form_cadastro.php';
        break;

               /**
     * Formulario
     */
    case 'registre':
        include 'view/registre.php';
        break;

                  /**
     * Formulario
     */
    case 'welcome':
        include 'view/welcome.php';
        break;
        
                  /**
     * Formulario
     */
    case 'logout':
        include 'view/logout.php';
        break;

        
                  /**
     * Formulario
     */
    case 'reset':
        include 'view/reset-password.php';
        break;


}
