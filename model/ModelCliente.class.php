<?php

/**
 * Ativar a segurança do sistema
 */
new Secure();

/**

 * Classe de CRUD com PDO para manter cliente
 * @version 1.0.0
 */
class ModelCliente extends ModelConexao {

    /**
     * Atributos da classe
     */
    private $id;
    private $uuid;
    private $nome;
    private $cpf;
    private $email;
    private $senha;
    private $permissao;
    private $data_criacao;
    private $data_atualizacao;
    private $status;
   

    /**
     * Métodos get e sets das classes
     */
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getCpf() {
        return $this->cpf;
    }

    
    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }
    
    /**
     * Get the value of uuid
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * Set the value of uuid
     */
    public function setUuid($uuid): self
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of senha
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     */
    public function setSenha($senha): self
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get the value of permissao
     */
    public function getPermissao()
    {
        return $this->permissao;
    }

    /**
     * Set the value of permissao
     */
    public function setPermissao($permissao): self
    {
        $this->permissao = $permissao;

        return $this;
    }

    /**
     * Get the value of data_criacao
     */
    public function getDataCriacao()
    {
        return $this->data_criacao;
    }

    /**
     * Set the value of data_criacao
     */
    public function setDataCriacao($data_criacao): self
    {
        $this->data_criacao = $data_criacao;

        return $this;
    }

    /**
     * Get the value of data_atualizacao
     */
    public function getDataAtualizacao()
    {
        return $this->data_atualizacao;
    }

    /**
     * Set the value of data_atualizacao
     */
    public function setDataAtualizacao($data_atualizacao): self
    {
        $this->data_atualizacao = $data_atualizacao;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     */
    public function setStatus($status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Método mágico para não permitir clonar a classe
     */
    public function __clone() {
        ;
    }

    /**
     * Método utilizado para consultar os clientes cadastrados
     * @access public 
     * @param Int $id id do cliente
     * @param String $nome nome do cliente
     * @return Array dados do cliente
     */
    public function consultarCliente($id, $nome) {

        #setar os valores
        $this->setId($id);
        $this->setNome($nome);

        #montar a consultar (whre 1 serve para selecionar todos os registros)
        $sql = "select * from usuario where true";

        #verificar se foi passado algum valor de $id_cliente    
        if ($this->getId() != null) {
            $sql.= " and id=:id";
        }

        #verificar se foi passado algum valor de $nome 
        if ($this->getNome() != null) {
            $sql.= " and nome LIKE :nome ";
        }

        #executa consulta e controi um array com o resultado da consulta
        try {
            $bd = $this->conectar();
            $query = $bd->prepare($sql);

            #verificar se foi passado algum valor de $id_cliente   
            if ($this->getId() != null) {
                $query->bindValue(':id', $this->getId(), PDO::PARAM_INT);
            }

            #verificar se foi passado algum valor de $nome 
            if ($this->getNome() != null) {
                $this->setNome("%" . $nome . "%");
                $query->bindValue(':nome', $this->getNome(), PDO::PARAM_STR);
            }
            $query->execute();

            $this->resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $e->getMessage();

            $this->resultado = null;
        }
        return $this->resultado;
    }

    /**
     * Método utilizado para inserir um cliente
     * @access public 
     * @param String $nome nome do cliente
     * @param String $cpf CPF do cliente
     * @param String $dtNascimento data de nascimento do cliente
     * @param String $telefone telefone do cliente
     * @return Boolean retorna TRUE se os dados forem salvos com sucesso
     */
    function inserirCliente($uuid,$nome, $cpf, $email, $senha,$permissao,$data_criacao,$status) {

        #setar os dados
        $this->setUuid($uuid);
        $this->setNome($nome);
        $this->setCpf($cpf);
        $this->setEmail($email);
        $this->setSenha($senha);
        $this->setPermissao($permissao);
        $this->setDataCriacao($data_criacao);
        $this->setStatus($status);


        #montar a consulta
        $sql = "INSERT INTO usuario (id,uuid,nome, cpf, email, senha, permissao,data_criacao, status) "
                . "VALUES (null,:uuid,:nome,:cpf,:email,:senha,:permissao,:data_criacao,:status)";

        #realizar a blidagem dos dados
        try {
            $bd = $this->conectar();
            $query = $bd->prepare($sql);
            $query->bindValue(':uuid', $this->getUuid(), PDO::PARAM_STR);
            $query->bindValue(':nome', $this->getNome(), PDO::PARAM_STR);
            $query->bindValue(':cpf', $this->getCpf(), PDO::PARAM_STR);
            $query->bindValue(':email', $this->getEmail(), PDO::PARAM_STR);
            $query->bindValue(':senha', $this->getSenha(), PDO::PARAM_STR);
            $query->bindValue(':permissao', $this->getPermissao(), PDO::PARAM_STR);
            $query->bindValue(':data_criacao', $this->getDataCriacao(), PDO::PARAM_STR);
            $query->bindValue(':status', $this->getStatus(), PDO::PARAM_STR);
            $query->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return false;
        }
    }

    /**
     * Método utilizado para alterar um cliente
     * @access public 
     * @param Int $id id do cliente
     * @param String $nome nome do cliente
     * @param String $cpf CPF do cliente
     * @param String $dtNascimento data de nascimento do cliente
     * @param String $telefone telefone do cliente
     * @return Boolean retorna TRUE se os dados forem salvos com sucesso
     */
    public function alterarCliente($id,$uuid,$nome, $cpf, $email,$status) {

        #setar os dados
        $this->setId($id);
        $this->setUuid($uuid);
        $this->setNome($nome);
        $this->setCpf($cpf);
        $this->setEmail($email);
       
       
        
       
        $this->setStatus($status);

        #montar a consulta
        $sql = "UPDATE usuario SET uuid=:uuid, nome = :nome, cpf = :cpf, email = :email,status=:status WHERE id = :id";

        #realizar a blidagem dos dados
        try {
            $bd = $this->conectar();
            $query = $bd->prepare($sql);
            $query->bindValue(':id', $this->getId(), PDO::PARAM_INT);
            $query->bindValue(':uuid', $this->getUuid(), PDO::PARAM_STR);
            $query->bindValue(':nome', $this->getNome(), PDO::PARAM_STR);
            $query->bindValue(':cpf', $this->getCpf(), PDO::PARAM_STR);
            $query->bindValue(':email', $this->getEmail(), PDO::PARAM_STR);
           
           
            $query->bindValue(':status', $this->getStatus(), PDO::PARAM_STR);
            $query->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return false;
        }
    }

    /**
     * Método utilizado para excluir um cliente cadastrado
     * @access public 
     * @param Int $id id do cliente
     * @return Boolean retorna TRUE se os dados for excluído sucesso
     */
    public function excluirCliente($id) {

        #setar os dados
        $this->setId($id);

        #montar a consulta
        $sql = "DELETE FROM usuario WHERE id=:id";

        #realizar a blidagem dos dados
        try {
            $bd = $this->conectar();
            $query = $bd->prepare($sql);
            $query->bindValue(':id', $this->getId(), PDO::PARAM_INT);
            $query->execute();
            return true;
        } catch (PDOException $e) {
            #$e->getMessage();   
            return false;
        }
    }
    
}
