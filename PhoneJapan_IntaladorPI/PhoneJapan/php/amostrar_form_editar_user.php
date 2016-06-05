<?php

     if ($result = $connection->query($consulta)) {
         if ($result->num_rows==0) {

         }else{
             while($fila=$result->fetch_object()){

 echo '<div class="form-group">
   <label class="col-md-4 control-label" for="usern">Usuario:</label>
   <div class="col-md-6">
   <input id="usern" name="usern" type="text" placeholder="Nombre de usuario" class="form-control input-md" value="'.$fila->USERNAME.'" required="required" disabled >
   <input id="coduser" name="coduser" type="hidden" placeholder="Nombre de usuario" class="form-control input-md" value="'.$_POST["coduser"].'" required="required">
   </div>
 </div>
</div>

<div style="float:right;width:50%">
 <div class="form-group" >
   <label class="col-md-4 control-label" for="npass">Contraseña:</label>
   <div class="col-md-6">
   <input id="npass" name="npass" type="password" placeholder="Introduzca su contraseña" class="form-control input-md" value="'.md5($fila->USERPASS).'" required="required" disabled>
   </div>
 </div>
</div>
</div>
</fieldset>

<div id="cr_conten_perfil">
<div id="cr_conten_form_perfil" class="form-horizontal" style="">
<fieldset>
<legend><span class="glyphicon glyphicon-user"></span>  Datos personales: </legend>
<div style="float:left;width:50%">
     <!-- Text input-->
     <div class="form-group">
       <label class="col-md-4 control-label" for="nom">Nombre:</label>
       <div class="col-md-6">
       <input id="nom" name="nom" type="text"  placeholder="Introduzca su nombre" class="form-control input-md" value="'.$fila->NOMBRE.'" required="required">
       </div>
     </div>
     <div class="form-group">
       <label class="col-md-4 control-label" for="ape">Apellidos:</label>
       <div class="col-md-6">
       <input id="ape" value="'.$fila->APELLIDOS.'" name="ape" type="text" placeholder="Introduzca sus apellidos" class="form-control input-md" required="required">
       </div>
     </div>
     <div class="form-group">
       <label class="col-md-4 control-label" for="fnac">F. Nacimiento:</label>
       <div class="col-md-6">
       <input id="fnac" name="fnac" type="date" value="'.$fila->FECHA_NAC.'" placeholder="Introduzca su f. de Nacimiento" class="form-control input-md" required="required">
       </div>
     </div>
     <div class="form-group">
       <label class="col-md-4 control-label" for="dni">NIF/DNI:</label>
       <div class="col-md-6">
       <input id="dni" name="dni" value="'.$fila->DNI.'" type="text" placeholder="Introduzca su NIF" class="form-control input-md" required="required">
       </div>
     </div>
     <div class="form-group">
       <label class="col-md-4 control-label" for="dir">Direccion:</label>
       <div class="col-md-6">
       <input id="dir" name="dir" value="'.$fila->DIRECCION.'" type="text" placeholder="Introduzca su dirección" class="form-control input-md" required="required">
       </div>
     </div>
     <div class="form-group">
       <label class="col-md-4 control-label" for="correo">Email:</label>
       <div class="col-md-6">
       <input id="correo" name="correo" value="'.$fila->EMAIL.'" type="email" placeholder="Introduzca su correo" class="form-control input-md" required="required">
       </div>
     </div>
     <div class="form-group">
       <label class="col-md-4 control-label" for="estado">Estado:</label>
       <div class="col-md-6">
           <select class="form-control" id="estado" name="estado">';
           if($fila->ESTADO=="ON"){
             echo '<option value="ON" selected>Activo</option>
             <option value="OFF">Inactivo</option>' ;
           }else{
               echo '<option value="ON">Activo</option>
             <option value="OFF" selected>Inactivo</option>' ;
           }
          echo '</select>
       </div>
     </div>
     </div>

     <div style="float:right;width:50%">
     <!-- Text input-->
     <div class="form-group">
       <label class="col-md-4 control-label" for="pais">Pais:</label>
       <div class="col-md-6">
       <input id="pais" name="pais" value="'.$fila->PAIS.'"  type="text" placeholder="Introduzca su Nacionalidad" class="form-control input-md" required="required">
       </div>
     </div>
     <div class="form-group">
       <label class="col-md-4 control-label" for="prov">Provincia:</label>
       <div class="col-md-6">
       <input id="prov" name="prov" type="text" value="'.$fila->PROVINCIA.'" placeholder="Introduzca su Provincia" class="form-control input-md" required="required">
       </div>
     </div>
     <div class="form-group">
       <label class="col-md-4 control-label" for="ciudad">Ciudad:</label>
       <div class="col-md-6">
       <input id="ciudad" name="ciudad" type="text" value="'.$fila->CIUDAD.'" placeholder="Introduzca sus ciudad" class="form-control input-md" required="required">
       </div>
     </div>
     <div class="form-group">
       <label class="col-md-4 control-label" for="cp">Código Postal:</label>
       <div class="col-md-6">
       <input id="cp" name="cp" type="number" value="'.$fila->CP.'" maxlength="5" placeholder="Introduzca su CP" class="form-control input-md" required="required">
       </div>
     </div>
     <div class="form-group">
       <label class="col-md-4 control-label" for="tlf">Teléfono:</label>
       <div class="col-md-6">
       <input id="tlf" name="tlf" type="number" value="'.$fila->TLF.'" maxlength="9" placeholder="Introduzca su tlf" class="form-control input-md" required="required">
       </div>
     </div>
     <div class="form-group">
       <label class="col-md-4 control-label" for="tipo">Tipo:</label>
       <div class="col-md-6">
           <select class="form-control" id="tipo" name="tipo">';
       if($fila->ROLE=="Admin"){
             echo '<option value="User">Cliente</option>
             <option value="Admin" selected>Administrador</option>' ;
           }else{
               echo '<option value="User" selected >Cliente</option>
             <option value="Admin">Administrador</option>' ;
           }
           echo '</select>
       </div>
     </div>
     <div class="form-group">
              <input type="submit" class="btn btn-primary btn-block" style="width:140px;float:right;margin-right:94px" value="Editar usuario">
     </div>
     </div>

 </fieldset>';
             }                                               }
         }

  ?>
