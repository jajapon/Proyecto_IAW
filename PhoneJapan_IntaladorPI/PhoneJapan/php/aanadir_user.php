<?php

        $user=$_POST["usern"];
        $pass=$_POST["npass"];
        $nom=$_POST["nom"];
        $ape=$_POST["ape"];
        $dni=$_POST["dni"];
        $fnac=$_POST["fnac"];
        $dir=$_POST["dir"];
        $correo=$_POST["correo"];
        $pais=$_POST["pais"];
        $prov=$_POST["prov"];
        $ciudad=$_POST["ciudad"];
        $cp=$_POST["cp"];
        $tlf=$_POST["tlf"];
        $estado=$_POST["estado"];
        $tipo=$_POST["tipo"];

        $consulta = "SELECT * FROM USUARIO WHERE USERNAME = '$user' OR EMAIL = '$correo';";
            if ($result = $connection->query($consulta)) {
                if ($result->num_rows==0) {
                    $consulta = "INSERT INTO USUARIO  VALUES (NULL,'$user', md5('$pass') ,'$tipo' ,'$estado','$correo','$nom','$ape','$dni','$fnac','$dir',$cp,'$ciudad','$prov','$pais',$tlf,1)";
                    if ($connection->query($consulta)) {
                         header("Location: ausuarios.php");
                    }else{

                    }
                }else{
                     echo '<script language="javascript">
                       $("#alert_msg").text("Ya existe un usuario con ese correo o nombre de usuario");
                           $(".alert").toggleClass("hidden").fadeIn(1000);
                           window.setTimeout(function() {
                               $(".alert").fadeTo(500, 0).slideUp(500, function(){
                                   $(this).remove();
                                });
                           }, 3000);
                        </script>';
                }
            }
    ?>
