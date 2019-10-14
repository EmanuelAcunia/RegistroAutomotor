<?php
include "../bases/conectar.php";

$sql = "select * from usuarios where user=?";
$consulta = $conexion->prepare($sql);
$bind = array($_POST['user']);
$consulta->execute($bind);

if ($registro=$consulta->fetch()) {
    //El usuario existe

    $clave = md5($_POST['passw']);
    $user = $registro['nombre'];
    
    if ($registro['passw']==$clave) {
        //El usuario existe y su clave es correcta
        session_start("sesion_agenda");
        $_SESSION['autenticado']="SI";
        $_SESSION["nombre"]=$registro['nombre'];
        header("Location: ../Aplicacion.php");
    }
    else {
        //El usuario existe pero su clave no es correcta
        
        header("Location: ../index.php?error=c&");
    }
}
else {
    //El usuario no existe
    header("Location: ../index.php?error=u");
}
?>

