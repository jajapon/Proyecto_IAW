function insertarProductoCesta(){
     var codprod=$("#cprod").val();
     var uri = './php/insertar_prod_cesta.php';
     var mensaje= $("#addComment").val();
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
     
     //var arraydatos={"codopi":codopinion,"codprod":codproducto};
}
