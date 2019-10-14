<?php
include "seguridad/seguridad.php";
include "bases/tipos.php";

if (isset($_GET['id'])) {
    include "bases/eventos.php";
    $resultado = buscar_id_evento($_GET['id']);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mi Agenda</title>
        <link rel="stylesheet" href="estilo/estilo.css" />                
    </head>
    <body>
        <div id="contenido">
            <div id="encabezado">
                <h1>Agenda de Eventos</h1>        
                <?php
                include "estructura/menu.php"
                ?>
            </div>
            <div id="principal">
        <h2>Actualización de Eventos</h2>
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
        
        <form method="post" action="grabarevento.php">
            <label for="fecha">Fecha:</label>
            <input type="text" name="fecha" size="10" maxlength="10" value="<?php if (isset($_GET['id'])) echo date("d/m/Y",strtotime($resultado['fecha'])); ?>" /><br> 
            <label for="tipo">Tipo:</label>
            <select name="tipo">
                <?php
                $tipos = mostrar_tipos();
                while ($registro = $tipos->fetch()) {
                    if ($registro['id_tipo']==$resultado['id_tipo'])
                        echo "<option value='".$registro['id_tipo']."' selected>".utf8_encode($registro['tipo'])."</option>";
                    else
                        echo "<option value='".$registro['id_tipo']."'>".utf8_encode($registro['tipo'])."</option>";
                }
                ?>
            </select>
            <br>
            <label for="descripcion">Descripcion:</label>
            <input type="text" name="descripcion" value="<?php if (isset($_GET['id'])) echo utf8_encode($resultado['descripcion']); ?>" <?php if (isset($_GET['op']) && $_GET['op']=="eliminar") echo "readonly"; ?>></input><br> 
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