<?php
    $mysqli = new mysqli("localhost","root","","phonejapan");
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    $iduser = $_GET["iduser"];
    $mysqli->query("DELETE FROM USUARIO WHERE COD_USU = ".$iduser);
?>
