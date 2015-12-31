<?php
    $mysqli = new mysqli("localhost","root","","phonejapan");
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    $codprod = $_GET["idprod"];
    $mysqli->query("DELETE FROM PRODUCTO WHERE COD_PROD = ".$codprod);
?>
