$(function(){
      $('#bs-prod').on('keyup',function(){
		        var dato = $('#bs-prod').val();
            var hide = "";
            if(dato==""){
              hide="false";
            }else{
              hide="true";
            }
            var url = './php/mostrar_busqueda_prods_index.php';
            var arraydatos={"dato":dato};
            $.ajax({
                type:'POST',
                url:url,
                data: arraydatos,
                success: function(data){
                     $(".prods_index_3").html(data);
                   if(hide=="true"){
                     $(".prods_index_1").hide();
                     $(".prods_index_2").hide();
                   }else{
                     $(".prods_index_1").show();
                     $(".prods_index_2").show();
                   }
                }
             });
            return false;
      });

      $('#search').on('click',function(){
           var min = 0;
           var max = 0;
           var pro = $('#prod').val();
           var ord = $('#orden').val();

           if($('#min').val()!=""){
             min=parseInt($('#min').val());
           }
           if($('#max').val()!=""){
             max=parseInt($('#max').val());
           }
            var url = './php/mostrar_busqueda_prods_productos.php';
            var arraydatos={"min":min, "max":max, "dato":pro, "orden": ord};

            $.ajax({
                type:'POST',
                url:url,
                data: arraydatos,
                success: function(data){
                    $(".prods_index_4").html(data);
                }
             });
            return false;
      });

});
