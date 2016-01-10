<?php

        $user=quitarComillas($_POST["usern"]);
        $pass=quitarComillas($_POST["npass"]);
        $nom=quitarComillas($_POST["nom"]);
        $ape=quitarComillas($_POST["ape"]);
        $dni=quitarComillas($_POST["dni"]);
        $fnac=quitarComillas($_POST["fnac"]);
        $dir=quitarComillas($_POST["dir"]);
        $correo=quitarComillas($_POST["correo"]);
        $pais=quitarComillas($_POST["pais"]);
        $prov=quitarComillas($_POST["prov"]);
        $ciudad=quitarComillas($_POST["ciudad"]);
        $cp=quitarComillas($_POST["cp"]);
        $tlf=quitarComillas($_POST["tlf"]);
        $estado=quitarComillas($_POST["estado"]);
        $tipo=quitarComillas($_POST["tipo"]);

        $consulta = "SELECT * FROM USUARIO WHERE USERNAME = '$user' OR EMAIL = '$correo';";
            if ($result = $connection->query($consulta)) {
                if ($result->num_rows==0) {
                    $consulta = "INSERT INTO USUARIO  VALUES (NULL,'$user', md5('$pass') ,'$tipo' ,'$estado','$correo','$nom','$ape','$dni','$fnac','$dir',$cp,'$ciudad','$prov','$pais',$tlf)";
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
