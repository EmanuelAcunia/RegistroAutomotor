<?php
$mensaje = "";
if (isset($_GET['error'])) {
    
    switch ($_GET['error']) {
        case "u":
            $mensaje = "El usuario no existe...";
            break;
        case "c":
            $mensaje = " Usuario Encontrado Aunque Su clave no es correcta...";
            break;
        case "l":
            $mensaje = "Primero debe loguearse... " ;
                
            break;
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Direccion General de Transito</title>
        <link rel="stylesheet" href="estilo/estilo.css" />
    </head>
    <body>
        <div id="contenido">
            <div id="encabezado">
                <h1>Registro De Accidentes</h1>        
            </div>
            <div id="principal">
                <form method="post" action="seguridad/autenticar.php">
                    <label for="user">Usuario:</label>
                    <input type="text" name="user" /><br> 
                    <label for="passw">Clave:</label>
                    <input type="password" name="passw"></input><br> 
                    <input type="submit" value="Entrar" />
                </form>
                <?php echo "<p class='mensaje_sesion'>$mensaje</p>";
                 
                ?>
            </div>   
        <?php
        include "estructura/pie.php";
        ?>
        </div>
        <?php //echo md5("123456") ?>
    </body>
</html>
