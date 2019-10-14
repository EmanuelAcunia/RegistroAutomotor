<?php
include "bases/eventos.php";
switch ($_POST['operacion']) {
    case "nuevo":
        nuevo_evento($_POST['fecha'],$_POST['tipo'],$_POST['descripcion'],$_POST['ubicacion']);
        break;
    case "eliminar":
        eliminar_evento($_POST['id']);
        break;
    case "modificar":
        modificar_evento($_POST['fecha'],$_POST['tipo'],$_POST['descripcion'],$_POST['ubicacion'],$_POST['id']);
        break;
    }
?>