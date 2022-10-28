<?php

/**
 * Ativar a segurança do sistema
 */
new Secure();

/**
 * Cria o objeto de controle cliente
 */
new ControlGeral();
?>
<html>
    <head>
        <title><?php echo NOMESISTEMA; ?></title>
        <!-- Link do Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/login.css">
    </head>
    <!-- Link do JQuery e seus plugins -->
    <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <body>
    <div id="site">

    <figure>
            <img src="images/logo.png" alt="Logo Markt Club">
        </figure>
        <!-- Login do sistema-->
       
                    <form action="index.php?verifica_login" method="POST">
                    <legend>FAÇA SEU LOGIN</legend>
                    <p>Digite seu CPF no campo abaixo e clique em logar para fazer seu login.</p>
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="login-username" type="text" class="form-control" name="login" value="" placeholder="CPF">                                        
                            </div>
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="login-password" type="password" class="form-control" name="senha" placeholder="Senha">
                            </div>
                            <div style="margin-top:10px" class="form-group">
                                <div class="col-sm-12 controls">
                                    <input type="submit" name="acessar" value="Logar" class="btn btn-primary btn-block btn-lg">
                                </div>
                               
                            </div>
                        </form>     
                    </div>                     
    </body>
</html>
