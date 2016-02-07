<?php
    include("./conexion.php");
    $iduser = $_GET["iduser"];
    $connection->query("DELETE FROM USUARIO WHERE COD_USU = ".$iduser);
?>
