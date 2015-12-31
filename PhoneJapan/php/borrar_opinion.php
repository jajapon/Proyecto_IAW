<?php
    $mysqli = new mysqli("localhost","root","","phonejapan");
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $codOpi = $_POST["codopi"];
    $consulta = "DELETE FROM OPINION WHERE COD_OPINION = ".$codOpi;
    $mysqli->query("DELETE FROM OPINION WHERE COD_OPINION = ".$codOpi);
?>
