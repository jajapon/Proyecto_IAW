function insertarProductoCesta(){
     var uri = './php/insertar_prod_cesta.php';
     var codprod= $("#cdprod").val();
     var arraydatos={"codprod":codprod};
     $.ajax({
           type : "POST",
           url : uri,
           data : arraydatos,
           datatype: "json",
           success:function(data){
               $("#ncesta").text(data);
           }           
     });
    return false;       
}
