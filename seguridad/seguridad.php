<?php
session_start("sesion_agenda");
if ($_SESSION['autenticado']!=="SI") {
    //El usuario se ha logueado correctamente
}
else {
    //El usuario no ha pasado por el loguin
    header("Location: index.php?error=l");
}
?>

