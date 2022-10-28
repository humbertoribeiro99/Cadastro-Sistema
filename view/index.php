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
    <title>Cadastro</title>
 <!-- Link para o CSS do bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/dataTables.bootstrap.min.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
     <!-- Link para o JQuery do bootstrap -->
     <script src="bootstrap/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="bootstrap/js/jquery.dataTables.min.js"></script>
        <script src="bootstrap/js/dataTables.bootstrap.min.js"></script>

    <div id="site">
        <header>
            <h1>USUÁRIOS</h1>
           
            <figure></figure>
            <a class="sair" href="index.php?login">sair</a>
        </header>
         <!-- Filtros para consulta -->
         <div class="col-md-6">
           
            <fieldset>
                <form method="post" name="frm_consultar">
                
                    <div class="form-group" style="padding-top: 1em;">
                        <label for="codigo" class="titulo">Código</label>
                        <input type="text" class="form-control" placeholder="código" name="dados[id][]">
                        <label for="nome" class="control-label">Nome</label>
                        <input type="text" class="form-control" placeholder="nome" name="dados[nome][]">
                    </div>
                    <p class="text-right">
                        <button type="submit" class="btn btn-primary" name="consultar" style="cursor: default;">Aperte em consultar para consultar todos</button>
                    </p>
                    <br>
                    <p class="text-right">
                        <button type="submit" class="btn btn-primary" name="consultar"><span class="glyphicon glyphicon-search"></span> Consultar</button>
                    </p>
                </form>
            </fieldset> 
        </div>
 <!-- Resultado da consulta -->
 <div class="titulo">
            <div class="row">
                <div class="titulo">
                    <div class="table-responsive">
                        <table id="tabela" class="table table-bordred table-striped" style="background-color: white;">
                            <thead>
                            <th class="">Código</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Email</th>
                            <th>Data</th>
                            <th>Status</th>
                            <th>Alterar</th>
                            <th>Excluir</th>
                            </thead>
                            <tbody>
                                <?php
                                /**
                                 * Foreach para listar os dados do cliente
                                 */
                                foreach ($clientes as $item) {
                                    echo "<tr>";
                                    echo "<td> {$item['id']} </td>";
                                    echo "<td> {$item['nome']} </td>";
                                    echo "<td> {$item['cpf']} </td>";
                                    echo "<td> {$item['email']} </td>";
                                    echo "<td> {$objcc->dataBrasileiro($item['data_criacao'])} </td>";
                                    echo "<td> {$item['status']} </td>";
                                    echo "<td><p data-placement='top' data-toggle='tooltip' title='Alterar'><button class='btn btn-primary btn-xs' data-title='Alterar' data-toggle='modal' data-target='#alterar{$item['id']}'><span class='glyphicon glyphicon-pencil'></span></button></p></td>";
                                    echo "<td><p data-placement='top' data-toggle='tooltip' title='Excluir'><button class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-target='#excluir{$item['id']}'><span class='glyphicon glyphicon-trash'></span></button></p></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>                         
                    </div>
                </div>
            </div>
        </div>     

        <?php
        /**
         * Foreach para listar os dados do cliente e definir a modal alterar
         */
        foreach ($clientes as $item_alterar) {
            ?>
            <!-- Modal alterar -->
         
            <div class="modal fade" id="alterar<?php echo $item_alterar['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                            <h4 class="modal-title custom_align" id="Heading">Alterar Usuario</h4>
                        </div>
                        <div class="modal-body">
                        <form method="post" class="cadastro">
                            <div class="input">
                            <label for="usuario">Usuario</label>
                            <input class="form-control" required type="text" name="dados[uuid][]" id="usuario" value="<?php echo $item_alterar['uuid']; ?>" />
                        </div>
                        <div class="input">
                            <label for="nome">Nome</label>
                            <input class="form-control" required type="text" name="dados[nome][]" id="nome" value="<?php echo $item_alterar['nome']; ?>" />
                        </div>
                        <div class="input">
                            <label for="cpf">CPF</label>
                            <input class="form-control" id="cpf" name="dados[cpf][]" type="text" title="Qual seu Cpf?" maxlength="14" value="<?php echo $item_alterar['cpf']; ?>">
                        </div>
                        <div class="input">
                            <label for="email">Email</label>
                            <input class="form-control" id="email" name="dados[email][]" type="email" title="Qual seu Email?" maxlength="20" value="<?php echo $item_alterar['email']; ?>">
                        </div>
                        
                      
                
                <div class="select">
                <label for="input_status">Status</label>
                <select name='dados[status][]' id="input_status" class="form-control" data-toggle="modal">
                    <option  value="">Escolha uma opção</option>
                    <option  name='dados[status][]' value="Ativo">Ativo</option>
                    <option  name='dados[status][]' value="Inativo">Inativo</option>
                </select>
                <div class="seta"><img src="images/seta.svg" alt=""></div>
            </div>
            
            <!-- input oculto para informar o id do cliente-->
            <input type="hidden" name="dados[id][]" value="<?php echo $item_alterar['id']; ?>" >
            <!-- botao para submeter o formulário --> 
             <button type="submit" name="alterar" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>Alterar</button>
          
            
           
        </form>
    </div>
            </div> 
            </div>
                    </div>
                
            <?php
        }
        ?>

<?php
        /**
         * Foreach para listar os dados do cliente e definir o modal exluir
         */
        foreach ($clientes as $item_excluir) {
            ?>
            <!-- Modal exluir -->
            <div class="modal fade" id="excluir<?php echo $item_excluir['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                            <h4 class="modal-title custom_align" id="Heading">Excluir Usuario</h4>
                        </div>
                        <div class="modal-body">
                            <form id="cliente" name="cliente" method="post" action="">
                                <!-- dados do cliente -->
                                <label for="id">Código</label>
                                <input class="form-control"name="id" type="text" readonly="true" id="id" value="<?php echo $item_excluir['id']; ?>" />
                                <label for="nome">Nome</label>
                                <input class="form-control"required type="text" readonly="true" name="nome" id="nome" value="<?php echo $item_excluir['nome']; ?>"/>
                                <!-- input oculto para informar o id do cliente-->
                                <input type="hidden" name="dados[id][]" value="<?php echo $item_excluir['id']; ?>" >
                                </br>
                                <!-- botao para submeter o formulário -->
                                <button id="enviar" type="submit" name="excluir"  class="btn btn-danger btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>Excluir</button>
                            </form>    
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?> 

                   
       
       
        <a href="index.php?form" class="botao_add">Adicionar novo</a>
    </div>
</body>

</html>
