$(function(){
      $('#bs-prod').on('keyup',function(){
		        var dato = $('#bs-prod').val();
            var url = './php/mostrar_busqueda_prods_index.php';
            var arraydatos={"dato":dato};
            $.ajax({
                type:'POST',
                url:url,
                data: arraydatos,
                success: function(data){
                   $(".prods_index_3").html(data);
                }
             });
            return false;
      });

});
