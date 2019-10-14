<?php
include "bases/tipos.php";
switch ($_POST['operacion']) {
    case "nuevo":
        nuevo_tipo($_POST['tipo'],$_POST['matricula'],$_POST['color'],$_POST['propietario'],$_POST['dni'],$_FILES['imagen']);
        break;
    case "eliminar":
        eliminar_tipo($_POST['id']);
        break;
    case "modificar":
        modificar_tipo($_POST['tipo'],$_POST['matricula'],$_POST['color'],$_POST['propietario'],$_POST['dni'],$_POST['imagen'],$_POST['id']);
        break;
    }
?>