<?php
include "seguridad/seguridad.php";
include "bases/eventos.php";
$consulta = buscar_fecha($_POST['fecha']);
?>

<table>
    <thead>
        <tr><th>#</th><th>Fecha</th><th>Tipo</th><th>Descripción</th></tr>
    </thead>
    <tbody>
                <?php
                $i=0;
                $fila = 0;
                while ($registro = $consulta->fetch()) {
                    $i++;
                    $fila++;
                    if($fila%2)
                        $estilo = 'fila1';
                    else
                        $estilo = 'fila2';
                    echo "<tr class='$estilo'><td>$i</td>"
                            . "<td>".date("d/m/Y",strtotime($registro['fecha']))."</td>"
                            . "<td>".utf8_encode($registro['tipo'])."</td>"
                            . "<td>".utf8_encode($registro['descripcion'])."</td></tr>";
                }
                ?>
        
    </tbody>
</table>

