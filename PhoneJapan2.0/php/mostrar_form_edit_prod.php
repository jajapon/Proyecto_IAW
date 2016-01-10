<?php
      $consulta = "SELECT * FROM PRODUCTO,CARACTERISTICAS WHERE PRODUCTO.COD_PROD = CARACTERISTICAS.COD_PROD AND PRODUCTO.COD_PROD=".$_POST["codprod"].";";
      if ($result = $connection->query($consulta)) {
             if ($result->num_rows==0) {

             } else {
               while($obj=$result->fetch_object()){
                  echo '<form style="position:relative;margin-bottom:35px;" method="post" role="form" class="form-horizontal" >
                          <fieldset>
                          <legend ><span class="glyphicon glyphicon-edit"></span> Editar Producto</legend>

                     <div id="izq">
                         <img src="'.$obj->IMAGEN.'" id="imagen_movil"/>
                     </div>
                     <div id="der" style="padding-top:30px;">
                         <table class="col-sm-offset-1">
                             <tr>
                                 <td><label class="col-md-4 control-label" for="marca">Marca:</label> </td>
                                 <td><input id="marca" name="marca" type="text" value="'.$obj->MARCA.'" placeholder="Introduzca la marca" class="form-control input-md" required="required"></td>
                             </tr>
                             <tr>
                                 <td><label class="col-md-4 control-label" for="modelo">Modelo:</label></td>
                                 <td><input id="modelo" name="modelo" value="'.$obj->MODELO.'" type="text" placeholder="Introduzca el modelo" class="form-control input-md" required="required"></td>
                             </tr>
                             <tr>
                                 <td><label class="col-md-4 control-label" for="precio">Precio:</label></td>
                                 <td><input id="npass" value="'.$obj->PRECIO_UNI.'" step="any" name="precio" min=1 type="number" placeholder="Introduzca el precio" class="form-control input-md" required="required"></td>
                             </tr>
                             <tr>
                                 <td><label class="col-md-4 control-label" for="stock">Stock:</label></td>
                                 <td><input id="stock" name="stock" value="'.$obj->STOCK.'" type="number" placeholder= "Introduzca la cantidad" class="form-control input-md" min=1 required="required" disabled></td>
                             </tr>
                             <tr>
                                 <td><label class="col-md-4 control-label" for="files">Imagen:</label></td>
                                 <td>
                                    <input type="file" id="files" onchange="myFunction()" accept="./imagenes/productos/" value="'.$obj->IMAGEN.'" name="files[]">
                                    <input id="urlimg" name="urlimg" value="'.$obj->IMAGEN.'" type="hidden" required="required">
                                    <input id="cprod" name="cprod" value="'.$obj->COD_PROD.'" type="hidden" required="required">
                                 </td>
                                       <script language="javascript">
                                           function myFunction() {
                                              var ruta = "./imagenes/productos/" + document.getElementById("files").files[0].name;
                                              $("#urlimg").val(ruta);
                                              $("#imagen_movil").attr("src",ruta).fadeIn();
                                           }
                                       </script>
                             </tr>
                         </table>
                     </div>
                      </fieldset>
                      <fieldset style="margin-top:-60px">
                        <legend><span class="glyphicon glyphicon-edit"></span> Características</legend>
                        <div class="row">
                          <div class="col-md-5">
                            <table style="width:100%;height:260px">
                              <tr>
                                  <td><label class="col-md-9 control-label" for="pan">Pantalla:</label></td>
                                  <td><input id="pan" name="pan" type="text" value="'.$obj->PANTALLA.'" placeholder="Introduzca la pantalla" class="form-control input-md" required="required"></td>
                              </tr>
                              <tr>
                                  <td><label class="col-md-9 control-label" for="res">Resolución:</label></td>
                                  <td><input id="res" name="res" type="text" value="'.$obj->RESOLUCION.'" placeholder="Introduzca la resolución" class="form-control input-md" required="required"></td>
                              </tr>
                              <tr>
                                  <td><label class="col-md-9 control-label" for="ram">Memoria RAM:</label></td>
                                  <td><input id="ram" name="ram" type="text" value="'.$obj->RAM.'" placeholder="Introduzca la RAM" class="form-control input-md"  required="required"></td>
                              </tr>
                              <tr>
                                  <td><label class="col-md-9 control-label" for="int">Memoria Interna:</label></td>
                                  <td><input id="int" name="int" type="text" value="'.$obj->MINTERNA.'" placeholder="Introduzca la Interna" class="form-control input-md" required="required"></td>
                              </tr>
                              <tr>
                                  <td><label class="col-md-9 control-label" for="pro">Procesador:</label></td>
                                  <td><input id="pro" name="pro" type="text" value="'.$obj->PROCESADOR.'" placeholder="Introduzca el procesador" class="form-control input-md" required="required"></td>
                              </tr>
                            </table>
                          </div>
                          <div class="col-sm-offset-1 col-md-6">
                            <table style="width:100%;height:260px">
                              <tr>
                                  <td><label class="col-md-9 control-label" for="so">Sistema Operativo:</label></td>
                                  <td><input id="stock" name="so" type="so"  value="'.$obj->SO.'" placeholder="Introduzca el SO" class="form-control input-md" required="required"></td>
                              </tr>
                              <tr>
                                  <td><label class="col-md-9 control-label" for="fro">Cámara Frontal:</label></td>
                                  <td><input id="fro" name="fro" type="text" value="'.$obj->FRONTAL.'" placeholder="Introduzca la cámara frontal" class="form-control input-md" required="required"></td>
                              </tr>
                              <tr>
                                  <td><label class="col-md-9 control-label" for="tra">Cámara Trasera:</label></td>
                                  <td><input id="tra" name="tra" type="text" value="'.$obj->TRASERA.'" placeholder="Introduzca la cámara trasera" class="form-control input-md" required="required"></td>
                              </tr>
                              <tr>
                                  <td><label class="col-md-9 control-label" for="sim">Tipo SIM:</label></td>
                                  <td><input id="sim" name="sim" type="text" value="'.$obj->SIM.'" placeholder="Introduzca el tipo de SIM" class="form-control input-md" required="required"></td>
                              </tr>
                              <tr>
                                  <td></td>
                                  <td><input type="submit" value="Editar" class="btn btn-success col-md-2" style="width:100px;" /></td>
                              </tr>
                            </table>
                          </div>
                      </div>
                      </fieldset>
                     </form>';

                      echo '<form style="position:relative;margin-bottom:35px;" method="post" role="form" class="form-horizontal" >
                          <fieldset>
                          <legend ><span class="glyphicon glyphicon-edit"></span> Solicitar suministro del Producto</legend></fieldset>
                     <div style="width:100%">
                        <table style="width:100%;">
                             <tr>
                                 <td><label class="col-md-4 control-label" for="cant">Cantidad:</label></td>
                                 <td>
                                    <input id="cant" name="cant" value="1" type="number" placeholder= "Introduzca la cantidad" class="form-control input-md" style="width:70%" min=1 required="required">
                                    <input id="cprod" name="cprod" value="'.$obj->COD_PROD.'" type="hidden" required="required">
                                 </td>
                                 <td><label class="col-md-4 control-label" for="prov">Proveedor:</label></td>
                                 <td>';

                   echo '<select class="form-control" id="prov" name="prov" class="form-control input-md">';
                  $consulta = "SELECT * FROM PROVEEDOR";
                  if ($result = $connection->query($consulta)) {
                      if ($result->num_rows==0) {
                      }else{
                          while($fila=$result->fetch_object()){
                            echo '<option value="'.$fila->COD_PROV.'">'.$fila->NOMBRE.'</option>' ;
                          }
                      }
                  }
                   echo '</select>';
                                 echo '</td>
                                 <td>
                                    <input type="submit" style="margin-left:10px;width:90%;" value="Editar" class="btn btn-success col-md-2" />
                                 </td>
                             </tr>
                          </table>
                     </div>
                     </form>';
                 }
              }
      }else {
      }

 ?>
