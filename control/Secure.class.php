<?php

/**
 * Ativar a segurança do sistema
 */
new Secure();

/**
 * Ativar a segurança do sistema
 * * @author sergio.lima
 */
class Secure {

    /**
     *  Método construtor
     */
    public function __construct() {


        /**
         * Ativar prevenção de ataques tipo XSS
         */
        ini_set('session.cookie_httponly', 1);

        /**
         * Ativar prevenção de fixação de sessão
         */
        ini_set('session.use_only_cookies', 1);

        /**
         * Ativar prevenção de cópia de cookies
         */
        ini_set('session.cookie_secure', 0);

        /**
         * Ativar sessao
         */
        session_start();

        /**
         * Ativar função para resolver problema de header
         */
        ob_start();

        /**
         * Ativar mostrar erros
         */
        error_reporting(~E_ALL & ~E_NOTICE & ~E_WARNING);

        /**
         * Ativar codificação UTF8
         */
        header('Content-Type: text/html; charset=UTF-8');
    }

}

?>
