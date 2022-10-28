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
class ControlCliente extends ControlGeral {

    /**
     * Método utilizado para validar os dados dos clientes cadastrados e invocar o método consultarCliente no model
     * @access public 
     * @param Int $id id do cliente
     * @param String $nome nome do cliente
     * @return Array dados do cliente
     */
    function consultarCliente($dados) {

        /**
         * extração dos dados do cliente
         */
        $nome = $dados['nome'][0];
        $id = $dados['id'][0];

        /**
         * Criar o objeto de Cliente
         */
        $objCliente = new modelCliente();

        /**
         * Inovocar o método
         */
        return $listaCliente = $objCliente->consultarCliente($id, $nome);
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
        $uuid = $dados['uuid'][0];
        $nome = $dados['nome'][0];
        $cpf = $dados['cpf'][0];
        $email = $dados['email'][0];
        $senha = $dados['senha'][0];
        $permissao = $dados['permissao'][0];
        $data_criacao=$dados['data_criacao'][0];
        $status = $dados['status'][0];

        /**
         * Criar o objeto de Cliente
         */
        $objCliente = new modelCliente();

        

        /**
         * Inovocar o método
         */
        if ($objCliente->inserirCliente($uuid,$nome, $cpf, $email, $senha,$permissao,$data_criacao,$status) == true) {
            /**
             * se for inserido com sucesso salvar a mensagem e redirecionar
             */
            $_SESSION['msg'] = "Salvo com sucesso!";
            header("location: index.php?form");
        } else {
            $_SESSION['msg'] = "Erro ao inserir!";
            /**
             * se não for inserido, salvar a mensagem e redirecionar
             */
            header("location: index.php?form");
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
        $id = $dados['id'][0];
        $uuid = $dados['uuid'][0];
        $nome = $dados['nome'][0];
        $cpf = $dados['cpf'][0];
        $email = $dados['email'][0];
        $status = $dados['status'][0];


        /**
         * Criar o objeto de Cliente
         */
        $objCliente = new modelCliente();

        /**
         * Inovocar o método
         */
        if ($objCliente->alterarCliente($id,$uuid, $nome, $cpf,$email,$status) == true) {

            /**
             * se for inserido com sucesso salvar a mensagem e redirecionar
             */
            $_SESSION['msg'] = "Alterado com sucesso!";
            header("location: index.php?index");
        } else {

            /**
             * se não for inserido, salvar a mensagem e redirecionar
             */
            $_SESSION['msg'] = "Erro ao alterar!";
            header("location: index.php?index");
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
        $id = $dados['id'][0];

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
            header("location: index.php?index");
        } else {

            /**
             * se não for inserido, salvar a mensagem e redirecionar
             */
            $_SESSION['msg'] = "Erro ao excluir!";
            header("location: index.php?index");
        }
    }
   

}
