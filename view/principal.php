<?php
/**
 * Ativar a segurança do sistema
 */
new Secure();

/**
 * Ativar o controle Cliente
 */
include_once 'control/controllerCliente.php';
?>
<html lang="pt-br">
    <head>
        <!-- define a codificação do HTML -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- define a o titulo do HMTL -->
        <title><?php echo NOMESISTEMA; ?></title>
        <!-- Link para o CSS do bootstrap -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    </head>
    <body>
        <!-- Link para o JQuery do bootstrap -->
        <script src="bootstrap/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
