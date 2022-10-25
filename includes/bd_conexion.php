<?php
    define('EFORMS_HOST', '10.7.3.233');
    define('EFORMS_DB_USUARIO', 'usrcrpjuliaenf');
    define('EFORMS_DB_PASSWORD', 'U$n@r!o#Jnl1V8D');
    define('EFORMS_DB_DATABASE', 'bdjulia');

    $conn = new mysqli(EFORMS_HOST, EFORMS_DB_USUARIO, EFORMS_DB_PASSWORD, EFORMS_DB_DATABASE);
    $conn->set_charset("utf8");
    
    if($conn->connect_error) {
      echo $conn->connect_error;
    }
