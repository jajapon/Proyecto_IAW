
function verDetallesPedido(codPedido){
    var uri = './php/mostrar_linea.php';
    $.ajax({
       type : "POST",
       url : uri,
       data : 'codPedido='+codPedido,
       datatype: "json",
       success:function(data){
           //alert(data[0]);
           var array = JSON.parse(data);
           var divAlto = 82;
           var marginbottom = 40;
           divAlto =divAlto+ 61*array[2];
           divAlto = divAlto + marginbottom;
           $('#mispedidos').html(array[1]);
           $('#mispedidos').css('height', divAlto);
       }
    });
    return false;
}
