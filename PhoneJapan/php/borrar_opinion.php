<?php
    include("./conexion.php");
    $codOpi = $_POST["codopi"];
    $consulta = "DELETE FROM OPINION WHERE COD_OPINION = ".$codOpi;
    $connection->query("DELETE FROM OPINION WHERE COD_OPINION = ".$codOpi);
?>
