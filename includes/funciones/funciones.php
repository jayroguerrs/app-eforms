<?php
    require_once('includes/bd_conexion.php');

    function obtener_template() {
        $file = basename($_SERVER['PHP_SELF']);
        $pagename = str_replace(".php","",$file); 

        return $pagename;
}

