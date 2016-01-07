$(document).ready(paginacion(1));
    function paginacion(pagina){
        if($('#bs-prov').val()==null){
            var dato = "";
        }else{
            var dato = $('#bs-prov').val();
        }
        var uri = './php/paginador_proveedores.php';
        var arraydatos={"dato":dato,"pagina":pagina};
        $.ajax({
           type : "POST",
           url : uri,
           data : arraydatos,
           datatype: "json",
           success:function(data){
               var array = JSON.parse(data);
               $('#agrega_tabla_prov').html(array[1]);
               $('#agrega_lista_prov').html(array[2]);
           }           
        });
        return false;
    }

function borrarProveedor(codprov){
        var uri = './php/borrar_proveedor.php';
        $.ajax({
           type : "POST",
           url : uri,
           data : 'codprov='+codprov,
           datatype: "json",
           success:function(data){
                paginacion(1);   
           }           
        });
        return false;
}

function verDetallesProv(codprov){
        var uri = './php/ver_detalles_proveedor.php';
        $.ajax({
           type : "POST",
           url : uri,
           data : 'codprov='+codprov,
           datatype: "json",
           success:function(data){
                var array = JSON.parse(data);
               $('#agrega_tabla_sum').html(array[1]);
   
           }           
        });
        return false;
}
$(function(){
    function paginacion(pagina){
        if($('#bs-prov').val()==null){
            var dato = "";
        }else{
            var dato = $('#bs-prov').val();
        }
        var uri = './php/paginador_proveedores.php';
        var arraydatos={"dato":dato,"pagina":pagina};
        $.ajax({
           type : "POST",
           url : uri,
           data : arraydatos,
           datatype: "json",
           success:function(data){
               var array = JSON.parse(data);
               $('#agrega_tabla_prov').html(array[1]);
               $('#agrega_lista_prov').html(array[2]);
           }           
        });
        return false;
    }
    
    $('#bs-prov').on('keyup',function(){
		var dato = $('#bs-prov').val();
        var pagina = 1;
        var url = './php/paginador_proveedores.php';
        var arraydatos={"dato":dato,"pagina":1};
        $.ajax({
                type:'POST',
                url:url,
                data: arraydatos,
                success: function(data){
                   var array = JSON.parse(data);
                   $('#agrega_tabla_prov').html(array[1]);
                   $('#agrega_lista_prov').html(array[2]);
                 }
         });
        return false; 
       
        
	});
    
});

