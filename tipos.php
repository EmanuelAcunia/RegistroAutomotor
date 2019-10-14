<?php
include "seguridad/seguridad.php";
include "bases/conectar.php";
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Direccion General de Transito</title>
        <link rel="stylesheet" href="estilo/estilo.css" />        
    </head>
    <body>
        <div id="contenido">
            <div id="encabezado">
                <h1>Registro Provincial de Vehiculos</h1>
                <?php
                $opcion3="actual";
                include "estructura/menu.php"
                ?>
            </div>
            <div id="principal">
            <h2>Listado</h2>
            <?php
            if (isset($_GET['resultado'])) {
                if ($_GET['resultado']=="ok") {
                    echo "<p class='mensaje'>La operación ha sido exitosa...</p>";
                }
                else {
                    echo "<p class='mensaje'>Hubo un error al intentar actualizar... Error nro: ".$_GET['resultado']."</p>";
                }
            }

            $consulta = $conexion->prepare("select * from tipos_evento"
                                            . " order by tipo");
            if ($consulta->execute()) echo ""; else print_r($consulta->errorInfo());
            ?>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Matricula</th>
                        <th>Color</th>
                        <th>Propieario</th>
                        <th>Dni</th>
                        <th>Imagen</th>
                        <th><a href="formulario_tipos.php?op=nuevo">Nuevo</a></th></tr>
                </thead>
                <tbody>
                    <?php
                    $fila = 0;
                    while ($registro = $consulta->fetch()) {
                        $fila++;
                        if($fila%2)
                            $estilo = 'fila1';
                        else
                            $estilo = 'fila2';
                        echo "<tr class='$estilo'><td>".$registro['id_tipo']."</td>"
                                . "<td>".utf8_encode($registro['tipo'])."</td>"
                                . "<td>".utf8_encode($registro['matriculav'])."</td>"
                                . "<td>".utf8_encode($registro['color'])."</td>"
                                . "<td>".utf8_encode($registro['propietariov'])."</td>"
                                . "<td>".utf8_encode($registro['dni'])."</td>"
                                
                               . "<td><img src='imagenes/".$registro['imagen']." alt='imagen' title='Imagen Ilustrativa' width='75 ' /></td>"
                                //. "<td class='centrado'><img src='imagenes/$registro[imagen]' alt='imagen' title='Imagen Ilustrativa' /></td>"
                                . "<td class='centrado'><a href='formulario_tipos.php?id=".$registro['id_tipo']."&op=modificar'><img src='imagenes/editar.png' title='Modificar Registro' /></a>"
                                . " <a href='formulario_tipos.php?id=".$registro['id_tipo']."&op=eliminar'><img src='imagenes/eliminar.png' title='Eliminar Registro' /></a></td></tr>";
                    }

            ?>
                </tbody>
            </table>
            </div>    
            <?php
            include "estructura/pie.php";
            ?>
        </div>
    </body>
</html>