<div id="menu">
    <?php if (isset($_SESSION['nombre'])) echo "<p class='usuario_sesion'>Bienvenid@: ".$_SESSION['nombre']."</p>"; ?>
<ul>
    <li class="<?php echo $opcion1 ?>"><a href="actualizacion.php">Archivo de Accidentes</a></li>
    <li class="<?php echo $opcion2 ?>"><a href="informe.php">Informes Por Fecha</a></li>
    <li class="<?php echo $opcion3 ?>"><a href="tipos.php">Vehiculos</a></li>
    <li class=""><a href="seguridad/salir.php">Salir</a></li>
</ul>
</div>
