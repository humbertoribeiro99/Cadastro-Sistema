<?php

session_start();


$login = $_POST['login'];
$senha = $_POST['senha'];

//criar o hash da senha novamente para fazer a verificação
$salt = 'projetodoze'.$login;
$senha_hash = sha1($salt.$senha);

//faz a verificação se existe usuario e senha para autenticar ele
$ps = $pdo->prepare(
    'SELECT * FROM usuario WHERE login = ? AND senha = ?'
);
$ps->execute([ $login, $senha_hash ]);

//se o usuario for autenticado, cria-se a variavel de sessao
if($dado = $ps->fetch()){
    //a variavel dado deixa de existir ao sair dessa pagina, mas como estou armazenando em uma $_SESSION eu consigo levar ele adiante
    $_SESSION['id'] = $dado['id'];
    $_SESSION['login'] = $dado['login'];
    $_SESSION['senha'] = $dado['senha'];

    echo "<span class='txt1 p-b-11'>Login Bem Sucedido</span><br>";
    echo "<span class='txt2 p-b-20'>A pagina será redirecionada em 10 segundos</span>";
    //redirecionamento para outra pagina usando 'html meta'
    echo "<meta http-equiv='refresh' content='10;url=index.php'>";

} else {
    //caso ele não encontre nada no fetch, ele retorna false e entra nesse else
    echo "<span class='txt1 p-b-11'>Falha Na Autenticação de Usuário</span><br>";
    echo "<span class='txt2 p-b-20'>A pagina será redirecionada em 10 segundos</span>";
    //redirecionamento para outra pagina usando 'html meta'
    echo "<meta http-equiv='refresh' content='10;url=index.php'>";
    exit;
}