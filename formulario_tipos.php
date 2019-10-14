<?php
include "seguridad/seguridad.php";
include "bases/tipos.php";

if (isset($_GET['id'])) {
    $resultado = buscar_id_tipo($_GET['id']);
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
                <h1>Registro Provincial de Vehiculo</h1>        
                <?php
                include "estructura/menu.php"
                ?>
            </div>
            <div id="principal">
        <h2>Actualización</h2>
        <?php
        if (isset($_GET['op'])) {
            switch ($_GET['op']) {
                case "nuevo":
                    echo "<h5>NUEVO REGISTRO</h5>";
                    $boton = "Guardar";
                    break;
                case "eliminar":
                    echo "<h5>ELIMINAR REGISTRO</h5>";
                    $boton = "Eliminar";
                    break;
                case "modificar":
                    echo "<h5>MODIFICAR REGISTRO</h5>";
                    $boton = "Modificar";
                    break;
            }
        }
        ?>
        
        <form method="post" action="grabartipo.php" enctype="multipart/form-data">
            <label for="tipo">Tipo:</label>
            <input type="text" name="tipo" value="<?php if (isset($_GET['id'])) echo utf8_encode($resultado['tipo']); ?>" /><br> 
            <label for="matricula">Matricula:</label>
            <input type="text" name="matricula" value="<?php if (isset($_GET['id'])) echo utf8_encode($resultado['matriculav']); ?>" /><br> 
            <label for="color">Color:</label>
            <input type="text" name="color" value="<?php if (isset($_GET['id'])) echo utf8_encode($resultado['color']); ?>" /><br> 
            <label for="propietario">Propietario:</label>
            <input type="text" name="propietario" value="<?php if (isset($_GET['id'])) echo utf8_encode($resultado['propietariov']); ?>" /><br> 
            <label for="dni">Dni:</label>
            <input type="text" name="dni" value="<?php if (isset($_GET['id'])) echo utf8_encode($resultado['dni']); ?>" /><br> 
            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" value="<?php //if (isset($_GET['id'])) echo utf8_encode($resultado['imagen']); ?>"></input><br> 
            <input type="submit" value="<?php echo $boton ?>" /><input type="reset" />
            <input type="hidden" name="operacion" value="<?php if (isset($_GET['op'])) echo $_GET['op'] ?>" />
            <input type="hidden" name="id" value="<?php if (isset($_GET['id'])) echo $_GET['id'] ?>" />
        </form>
        </div>
        <?php
        include "estructura/pie.php";
        ?>
        </div>
    </body>
</html>