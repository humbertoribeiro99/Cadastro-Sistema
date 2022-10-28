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

<html lang="pt-br">
    <head>
        <!-- define a codificação do HTML -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- define a o titulo do HMTL -->
        <title><?php echo NOMESISTEMA ?></title>
        <!-- Link para o CSS do bootstrap -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/css/dataTables.bootstrap.min.css">
    </head>
    <body>
        <!-- Link para o JQuery do bootstrap -->
        <script src="bootstrap/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="bootstrap/js/jquery.dataTables.min.js"></script>
        <script src="bootstrap/js/dataTables.bootstrap.min.js"></script>

        <!-- Ativação do DataTables -->
        <script>
            $(document).ready(function () {
                $('#tabela').DataTable();
            });
        </script>

        <!-- Mostrar caminho-->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?principal">Home</a></li>
                <li class="breadcrumb-item">Cliente</li>
                <li class="breadcrumb-item active" aria-current="page">Listar</li>
            </ol>
        </nav>


        <!-- Filtros para consulta -->
        <div class="col-md-12">
            <p class="text-right"> <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">+ Novo</button></p>
            <fieldset>
                <legend>Dados da Consulta</legend>
                <form method="post" name="frm_consultar">
                    <div class="form-group">
                        <label for="codigo" class="control-label">Código</label>
                        <input type="text" class="form-control" placeholder="código" name="dados[id_cliente][]">
                        <label for="nome" class="control-label">Nome</label>
                        <input type="text" class="form-control" placeholder="nome" name="dados[nome][]">
                    </div>
                    <p class="text-right">
                        <button type="submit" class="btn btn-primary" name="consultar"><span class="glyphicon glyphicon-search"></span> Consultar</button>
                    </p>
                </form>
            </fieldset> 
        </div>

        <!-- Resultado da consulta -->
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="tabela" class="table table-bordred table-striped">
                            <thead>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Nascimento</th>
                            <th>Telefone</th>
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
                                    echo "<td> {$objcc->dataBrasileiro($item['dtNascimento'])} </td>";
                                    echo "<td> {$item['telefone']} </td>";
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
                            <h4 class="modal-title custom_align" id="Heading">Alterar Cliente</h4>
                        </div>
                        <div class="modal-body">

                            <form enctype="multipart/form-data" method="post" action="">
                                <!-- dados do cliente -->
                                <label for="id">Código</label>
                                <input class="form-control" name="dados[id_cliente][]" type="text" readonly="true" id="id_cliente" value="<?php echo $item_alterar['id']; ?>" />
                                <label for="nome">Nome</label>
                                <input class="form-control" required type="text" name="dados[nome][]" id="nome" value="<?php echo $item_alterar['nome']; ?>"/>
                                <label for="cpf">CPF</label>
                                <input class="form-control" required id="cpf" name="dados[cpf][]" type="text" value="<?php echo $item_alterar['cpf']; ?>" title="Qual seu CPF?" maxlength="14" title="Digite o CPF somente numeros">
                                <label for="dtNascimento">Data Nascimento</label>
                                <input class="form-control" required id="dtNascimento" name="dados[dtNascimento][]" value="<?php echo $item_alterar['dtNascimento']; ?>" type="date" title="Qual sua Data de Nascimento?" maxlength="14">
                                <label for="telefone">Telefone</label>
                                <input class="form-control" id="telefone" name="dados[telefone][]" type="text" value="<?php echo $item_alterar['telefone']; ?>" title="Qual seu telefone?" maxlength="14">
                                </br>
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
                            <h4 class="modal-title custom_align" id="Heading">Excluir Cliente</h4>
                        </div>
                        <div class="modal-body">
                            <form id="cliente" name="cliente" method="post" action="">
                                <!-- dados do cliente -->
                                <label for="id">Código</label>
                                <input class="form-control"name="id" type="text" readonly="true" id="id" value="<?php echo $item_excluir['id']; ?>" />
                                <label for="nome">Nome</label>
                                <input class="form-control"required type="text" readonly="true" name="nome" id="nome" value="<?php echo $item_excluir['nome']; ?>"/>
                                <label for="cpf">CPF</label>
                                <input class="form-control"required id="cpf" readonly="true" name="cpf" type="text" value="<?php echo $item_excluir['cpf']; ?>" title="Qual seu CPF?" maxlength="14" title="Digite o CPF somente numeros">
                                <label for="dtNascimento">Data Nascimento</label>
                                <input class="form-control"required id="dtNascimento" readonly="true" name="dtNascimento" value="<?php echo $item_excluir['dtNascimento']; ?>" type="date" title="Qual sua Data de Nascimento?" maxlength="14">
                                <label for="telefone">Telefone</label>
                                <input class="form-control" id="telefone" name="telefone" readonly="true" type="text" value="<?php echo $item_excluir['telefone']; ?>" title="Qual seu telefone?" maxlength="14">
                                <!-- input oculto para informar o id do cliente-->
                                <input type="hidden" name="dados[id_cliente][]" value="<?php echo $item_excluir['id']; ?>" >
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

        <!-- Inserir Cliente -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form method="post">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Inserir</h4>
                        </div>
                        <div class="modal-body">
                            <label for="nome">Nome</label>
                            <input class="form-control" required type="text" name="dados[nome][]" id="nome" />
                            <label for="cpf">CPF</label>
                            <input class="form-control" required id="cpf" name="dados[cpf][]" type="text" title="Qual seu CPF?" maxlength="14" title="Digite o CPF somente numeros">
                            <label for="dtNascimento">Data Nascimento</label>
                            <input class="form-control" required id="dtNascimento" name="dados[dtNascimento][]" type="date" title="Qual sua Data de Nascimento?" maxlength="14">
                            <label for="telefone">Telefone</label>
                            <input class="form-control" id="telefone" name="dados[telefone][]" type="text" title="Qual seu telefone?" maxlength="14">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="inserir" class="btn btn-primary">Inserir</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>
