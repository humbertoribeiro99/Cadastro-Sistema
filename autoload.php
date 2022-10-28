<?php

/**
 * Ativar as classes do sistena
 */
function autoloadModel($className) {
    $filename = "model/" . $className . ".class.php";
    if (is_readable($filename)) {
        require $filename;
    }
}

function autoloadController($className) {
    $filename = "control/" . $className . ".class.php";
    if (is_readable($filename)) {
        require $filename;
    }
}

/**
 * Registrar as classes do sistema
 */
spl_autoload_register("autoloadModel");
spl_autoload_register("autoloadController");

/**
 * Ativar a segurança do sistema
 */
new Secure();
?>