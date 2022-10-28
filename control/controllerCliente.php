<?php

/**
 * Ativar a segurança do sistema
 */
new Secure();

/**
 * Cria o objeto de controle cliente
 */
$objcc = new ControlCliente();

/**
 * Mostrar o menu principal
 */


/**
 * Mostrar a mensagem na tela
 */
$objcc->alerta($_SESSION['msg']);


/**
 * CONSULTAR
 * Verficar o o botão 'consultar' foi acionado
 */
#
if (isset($_POST['consultar'])) {
    /**
     * Apagar mensagens da variável de sessão
     */
    $_SESSION['msg'] = '';

    /**
     * Passar os parâmetros para consultar cliente
     */
    $clientes = $objcc->consultarCliente($_POST['dados']);
}

/**
 * INSERIR
 * Verficar o o botão 'inserir' foi acionado
 */
if (isset($_POST["inserir"])) {
    /**
     * Apagar mensagens da variável de sessão
     */
    $_SESSION['msg'] = '';
    /**
     * Passar os parâmetros para inserir cliente
     */
    $objcc->inserirCliente($_POST['dados']);
}

/**
 * ALTERAR
 * Verficar o o botão 'alterar' foi acionado
 */
if (isset($_POST["alterar"])) {

    /**
     * Apagar mensagens da variável de sessão
     */
    $_SESSION['msg'] = '';
    /**
     * Passar os novos dados do cliente para o controle realizar a alteração
     */
    $objcc->alterarCliente($_POST['dados']);
    /**
     * Mostrar dados do cliente selecionado depois de alterado
     */
    $clientes = $objcc->consultarCliente(null);
}

/**
 * EXCLUIR
 * Verficar o o botão 'excluir' foi acionado
 */
if (isset($_POST["excluir"])) {
    /**
     * Apagar mensagens da variável de sessão
     */
    $_SESSION['msg'] = '';
    /**
     * Passar o id do cliente para o controle realizar a exclusão
     */
    $objcc->excluirCliente($_POST['dados']);
}
?>


