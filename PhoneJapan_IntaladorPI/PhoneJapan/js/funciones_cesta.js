function insertarProductoCesta(cdprod){
     var uri = './php/insertar_prod_cesta.php';
     var arraydatos={"codprod":cdprod};
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

function borrarCesta(codprod,coduser){
  var uri = "./php/borrar_producto_cesta.php";
  var arraydatos = {"codprod":codprod,"coduser":coduser};
  $.ajax({
    type: "POST",
    url: uri,
    data: arraydatos,
    datatype: "json",

    success:function(data){
        var array = JSON.parse(data);
        $("#micestat").html(array[1]);
        $("#numcesta").html(array[2]);
    }
  });
}
