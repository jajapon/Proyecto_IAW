<?php
    include("./conexion.php");
    $codprod = $_GET["idprod"];
    $connection->query("DELETE FROM PRODUCTO WHERE COD_PROD = ".$codprod);
?>
