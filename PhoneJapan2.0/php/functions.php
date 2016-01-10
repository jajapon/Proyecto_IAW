<?php
  function quitarComillas($valor){
    if(get_magic_quotes_gpc()){
      $valor = stripslashes($valor);
    }
    //comprueba si existe la función
    if(function_exists("mysql_real_escape_string")){
        $valor = mysql_real_escape_string($valor);
        //para las versiones < 4.3.0 de php usamos addslashes
    }else {
        $valor = addslashes($valor);
    }
    return $valor;
  }
?>
