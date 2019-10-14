<?php
    $driver  = "mysql";
    $host    = "localhost";
    $dbname  = "agenda";
    $usuario = "root";
    $passw   = "root";
    
    $conexion = new PDO("$driver:host=$host;dbname=$dbname",$usuario,$passw);
?>