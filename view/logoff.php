<?php

session_start();

$_SESSION = [];

//destruir os cookies de sessão
if(isset($_COOKIE[session_name()])) {
    setcookie(session_name(),'', time()-42000, '/');
}

session_destroy();
require('login.php')

?>