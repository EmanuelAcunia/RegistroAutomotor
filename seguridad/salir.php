<?php
session_start("sesion_agenda");
session_destroy();
header("Location: ../index.php");
?>
