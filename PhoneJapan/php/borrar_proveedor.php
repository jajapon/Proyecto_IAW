<?php
    $mysqli = new mysqli("localhost","root","","phonejapan");
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    $idprov = $_POST["codprov"];
    $mysqli->query("DELETE FROM PROVEEDOR WHERE COD_PROV = ".$idprov);
?>
