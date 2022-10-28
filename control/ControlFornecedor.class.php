<?php

/**
 * Ativar a segurança do sistema
 */
new Secure();

/**
 * Criado em 01/01/2015
 * Classe de controle do cliente
 * @author Sérgio Lima (professor.sergiolima@gmail.com)
 * @version 1.0.0
 */
class ControlFornecedor extends ControlGeral {

    /**
     * Método utilizado para validar os dados dos clientes cadastrados e invocar o método consultarCliente no model
     * @access public 
     * @param Int $id id do cliente
     * @param String $nome nome do cliente
     * @return Array dados do cliente
     */
    function consultarFornecedor($dados) {

        /**
         * extração dos dados do cliente
         */
        $nome = $dados['nome'][0];
        $id = $dados['id_cliente'][0];

        /**
         * Criar o objeto de Cliente
         */
        $objFornecedor = new modelFornecedor();

        /**
         * Inovocar o método
         */
        return $listaCliente = $objFornecedor->consultarFornecedor($id, $nome);
    }

    /**
     * Método utilizado validar os dados dos clientes cadastrados e invocar o método inserirCliente no model
     * @access public 
     * @param Array $dados com os dados do cliente
     * @return Boolean retorna TRUE se os dados forem salvos com sucesso
     */
    function inserirCliente($dados) {

        /**
         * extração dos dados do cliente
         */
        $nome = $dados['nome'][0];
        $cpf = $dados['cpf'][0];
        $dtNascimento = $dados['dtNascimento'][0];
        $telefone = $dados['telefone'][0];

        /**
         * Criar o objeto de Cliente
         */
        $objCliente = new modelCliente();

        /**
         * tratar a data de nascimento
         */
        $dtNascimento = $this->dataAmericano($dtNascimento);

        /**
         * Inovocar o método
         */
        if ($objCliente->inserirCliente($nome, $cpf, $dtNascimento, $telefone) == true) {
            /**
             * se for inserido com sucesso salvar a mensagem e redirecionar
             */
            $_SESSION['msg'] = "Salvo com sucesso!";
            header("location: index.php?cliente");
        } else {
            $_SESSION['msg'] = "Erro ao inserir!";
            /**
             * se não for inserido, salvar a mensagem e redirecionar
             */
            header("location: index.php?cliente");
        }
    }

    /**
     * Método utilizado validar os dados dos clientes e invocar o método alterarCliente no model
     * @access public 
     * @param Int $id id do cliente
     * @param String $nome nome do cliente
     * @param String $cpf CPF do cliente
     * @param String $dtNascimento data de nascimento do cliente
     * @param String $telefone telefone do cliente
     * @return Boolean retorna TRUE se os dados forem salvos com sucesso
     */
    function alterarCliente($dados) {

        /**
         * extração dos dados do cliente
         */
        $id = $dados['id_cliente'][0];
        $nome = $dados['nome'][0];
        $cpf = $dados['cpf'][0];
        $dtNascimento = $dados['dtNascimento'][0];
        $telefone = $dados['telefone'][0];


        /**
         * Criar o objeto de Cliente
         */
        $objCliente = new modelCliente();

        /**
         * Inovocar o método
         */
        if ($objCliente->alterarCliente($id, $nome, $cpf, $dtNascimento, $telefone) == true) {

            /**
             * se for inserido com sucesso salvar a mensagem e redirecionar
             */
            $_SESSION['msg'] = "Alterado com sucesso!";
            header("location: index.php?cliente");
        } else {

            /**
             * se não for inserido, salvar a mensagem e redirecionar
             */
            $_SESSION['msg'] = "Erro ao alterar!";
            header("location: index.php?cliente");
        }
    }

    /**
     * Método utilizado para validar os dados dos clientes e invocar o método excluirCliente no model
     * @access public 
     * @param Int $id id do cliente
     * @return Boolean retorna TRUE se os dados for excluído sucesso
     */
    function excluirCliente($dados) {

        /**
         * extração dos dados do cliente
         */
        $id = $dados['id_cliente'][0];

        /**
         * Criar o objeto de Cliente
         */
        $objCliente = new modelCliente();

        /**
         * Inovocar o método
         */
        if ($objCliente->excluirCliente($id) == true) {
            /**
             * se for inserido com sucesso salvar a mensagem e redirecionar
             */
            $_SESSION['msg'] = "Excluído com sucesso!";
            header("location: index.php?cliente");
        } else {

            /**
             * se não for inserido, salvar a mensagem e redirecionar
             */
            $_SESSION['msg'] = "Erro ao excluir!";
            header("location: index.php?cliente");
        }
    }

}
