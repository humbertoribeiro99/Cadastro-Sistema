<?php
/**
 * Ativar a segurança do sistema
 */
new Secure();

/**
 * Ativar o controle de clientes
 */
include_once 'control/controllerCliente.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/form.css">
</head>

<!-- Link do JQuery e seus plugins -->
    <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<body>
    <div id="site">
        <header>
            <a class="voltar" href="index.php?index"><img src="images/voltar.svg"></a>
            <h1 class="total">Salvar novo usuário</h1>
            <figure></figure>
            <a class="sair" href="index.php?login">sair</a>
        </header>
        <form method="post" class="cadastro">
                            <div class="input">
                            <label for="usuario">Usuario</label>
                            <input class="form-control" required type="text" name="dados[uuid][]" id="usuario" />
                        </div>
                        <div class="input">
                            <label for="nome">Nome</label>
                            <input class="form-control" required type="text" name="dados[nome][]" id="nome" />
                        </div>
                        <div class="input">
                            <label for="cpf">CPF</label>
                            <input class="form-control" id="cpf" name="dados[cpf][]" type="text" title="Qual seu Cpf?" maxlength="14">
                        </div>
                        <div class="input">
                            <label for="email">Email</label>
                            <input class="form-control" id="email" name="dados[email][]" type="email" title="Qual seu Email?" maxlength="20">
                        </div>
                        <div class="input">
                            <label for="senha">Senha:</label>
                            <input class="form-control" id="senha" name="dados[senha][]" type="password" title="Qual sua Senha?" maxlength="14">
                        </div>
                      
                
            <div class="select">
                <label for="input_status">Status</label>
                <select name='dados[status][]' id="input_status">
                    <option value="">Escolha uma opção</option>
                    <option  name='dados[status][]' value="Ativo" >Ativo</option>
                    <option  name='dados[status][]' value="Inativo">Inativo</option>
                </select>
                <div class="seta"><img src="images/seta.svg" alt=""></div>
            </div>
        
            <h2>Permissão</h2>
            <div class="permissao">
                <div class="checkbox">
                    <input type="checkbox" id="input_permissao_login" name="dados[permissao][]" value="login">
                    <div class="check"><img src="images/check.svg"></div>
                    <label for="input_permissao_login">Login</label>
                </div>
                <div class="checkbox">
                    <input type="checkbox" id="input_permissao_usuario_add" name="dados[permissao][]" value="usuario_add">
                    <div class="check"><img src="images/check.svg"></div>
                    <label for="input_permissao_usuario_add">Add usuário</label>
                </div>
                <div class="checkbox">
                    <input type="checkbox" id="input_permissao_usuario_editar" name="dados[permissao][]" value="usuario_editar">
                    <div class="check"><img src="images/check.svg"></div>
                    <label for="input_permissao_usuario_editar">Editar usuário</label>
                </div>
                <div class="checkbox">
                    <input type="checkbox" id="input_permissao_usuario_deletar" name="dados[permissao][]" value="usuario_deletar">
                    <div class="check"><img src="images/check.svg"></div>
                    <label for="input_permissao_usuario_deletar">Deletar usuário</label>
                </div>
            </div>
            <br>
            <div class="input">
                            <label for="data">Data de Criação</label>
                            <input class="form-control" id="data" name="dados[data_criacao][]" type="date" title="DATA" maxlength="14">
                        </div>
            <div class="modal-footer">
                            <button type="submit" name="inserir" class="btn btn-primary">Salvar</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        </div>
           
        </form>
    </div>
</body>

</html>
