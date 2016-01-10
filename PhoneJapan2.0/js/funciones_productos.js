$(document).ready(paginacion(1));
function paginacion(pagina){
    
    if($('#bs-prod').val()==null){
        var dato = "";
    }else{
        var dato = $('#bs-prod').val();
    }
    var uri = './php/busca_producto_marca_modelo.php';
    var arraydatos={"dato":dato,"pagina":pagina};
    $.ajax({
       type:'GET',
       url:uri,
       data: arraydatos,
       datatype: "json",
       success:function(data){
           var array = JSON.parse(data);
           $('#agrega_tabla_prods').html(array[1]);
           $('#agrega_lista_prods').html(array[2]);
       }           
    });
    return false;
}
function borrarProducto(idprod){
        var uri = './php/borrar_producto.php';
        $.ajax({
           type : "GET",
           url : uri,
           data : 'idprod='+idprod,
           datatype: "json",
           success:function(data){
                paginacion(1);   
           }           
        });
        return false;
}
$(function(){
      function paginacion(pagina){
         if($('#bs-prod').val()==null){
            var dato = "";
        }else{
            var dato = $('#bs-prod').val();
        }
         var uri = './php/busca_producto_marca_modelo.php';
         var arraydatos={"dato":dato,"pagina":pagina};
            $.ajax({
               type:'GET',
               url:uri,
               data: arraydatos,
               datatype: "json",
               success:function(data){
               //alert(data[0]);
                   var array = JSON.parse(data);
                   $('#agrega_tabla_prods').html(array[1]);
                   $('#agrega_lista_prods').html(array[2]);
               }           
        });
        return false;
      }
    
      $('#bs-prod').on('keyup',function(){
		    var dato = $('#bs-prod').val();
    
            var pagina = 1;
            var url = './php/busca_producto_marca_modelo.php';
            var arraydatos={"dato":dato,"pagina":1};
            $.ajax({
                type:'GET',
                url:url,
                data: arraydatos,
                success: function(data){
                   var array = JSON.parse(data);                
                   $('#agrega_tabla_prods').html(array[1]);
                   $('#agrega_lista_prods').html(array[2]);
                }
             });
            return false; 
        });
        
});
