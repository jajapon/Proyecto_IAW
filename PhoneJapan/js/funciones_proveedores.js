$(document).ready(paginacion(1));
function paginacion(pagina){
    var uri = './php/paginador_proveedores.php';
    $.ajax({
       type : "GET",
       url : uri,
       data : 'pagina='+pagina,
       datatype: "json",
       success:function(data){
           //alert(data[0]);
           var array = JSON.parse(data);
           $('#agrega_tabla_user').html(array[1]);
           $('#agrega_lista_user').html(array[2]);
       }           
    });
    return false;
}

function borrarUser(iduser){
    var uri = './borrar_usuario.php';
    $.ajax({
       type : "GET",
       url : uri,
       data : 'iduser='+iduser,
       datatype: "json",
       success:function(data){
            paginacion(1);   
       }           
    });
    return false;
}