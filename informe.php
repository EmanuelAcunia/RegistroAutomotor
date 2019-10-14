<?php
include "seguridad/seguridad.php";
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
        <script src="js/jquery.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/informe.js"></script>
        <link rel="stylesheet" href="estilo/jquery-ui.css">
        <script>
            $(function() {
              $( "#fecha" ).datepicker();
            });        
        </script>
    </head>
    <body>
        <div id="contenido">
            <div id="encabezado">
                <h1>Agenda de Eventos</h1>

                <?php
                include "estructura/menu.php";
                ?>
            </div>
            <div id="principal">
                <h2>Informe </h2>

                <label for="fecha">Fecha:</label>
                <input name="fecha" id="fecha" size="10" maxlength="10"  />
                <button onclick="consultar()">Consultar</button>
                <br><br>
                <div id="resultado">

                </div>
                <?php

                ?>
            </div>    
            <?php
            include "estructura/pie.php";
            ?>
        </div>
    </body>
</html>
