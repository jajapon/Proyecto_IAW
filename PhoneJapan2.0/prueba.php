<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  </head>
  <body>
    <img id="preview" src="" alt="" style="width:170px;height:300px;border:solid red 1px" />
    <form  method="POST" enctype="multipart/form-data">
    	<label id="a" for="imagen">Imagen:</label>
    	<input type="file" name="imagen" id="imagen" />
    	<input type="submit" name="subir" value="Subir"/>
    </form>

    <script language="javascript">

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imagen").change(function(){
        readURL(this);
    });
    </script>
    <?php
    if(isset($_POST["subir"])){
    if ($_FILES["imagen"]["error"] > 0){
      echo "ha ocurrido un error";
    } else {
              //ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
              //y que el tamano del archivo no exceda los 100kb
              $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
              $limite_kb = 100;

              if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
                //esta es la ruta donde copiaremos la imagen
                //recuerden que deben crear un directorio con este mismo nombre
                //en el mismo lugar donde se encuentra el archivo subir.php
                $ruta = "./imagenes/productos/" . $_FILES['imagen']['name'];
                //comprovamos si este archivo existe para no volverlo a copiar.
                //pero si quieren pueden obviar esto si no es necesario.
                //o pueden darle otro nombre para que no sobreescriba el actual.
                if (!file_exists($ruta)){
                  //aqui movemos el archivo desde la ruta temporal a nuestra ruta
                  //usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
                  //almacenara true o false
                  $resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
                  if ($resultado){
                    echo "el archivo ha sido movido exitosamente";
                  } else {
                    echo "ocurrio un error al mover el archivo.";
                  }
                } else {
                  echo $_FILES['imagen']['name'] . ", este archivo existe";
                }
              } else {
                echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
              }
      }
    }
    ?>
  </body>
</html>
