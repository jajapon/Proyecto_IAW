<?php
    include("./conexion.php");
    $idprov = $_POST["codprov"];
    $connection->query("DELETE FROM PROVEEDOR WHERE COD_PROV = ".$idprov);
?>
