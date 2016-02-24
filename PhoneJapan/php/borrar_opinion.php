<?php
    include("./conexion.php");
    $codOpi = $_POST["codopi"];
    $consulta = "DELETE FROM OPINION WHERE COD_OPINION = ".$codOpi;
    $mysqli->query("DELETE FROM OPINION WHERE COD_OPINION = ".$codOpi);
?>
