function borrarOpinion(codopinion, codproducto){
    var uri = './php/borrar_opinion.php';
    var arraydatos={"codopi":codopinion,"codprod":codproducto};
    $.ajax({
       type : "POST",
       url : uri,
       data : arraydatos,
       datatype: "json",
       success:function(data){
            listarOpiniones(codproducto);   
       }           
    });
    return false;
}

 function listarOpiniones(codproducto){
        var uri = './php/listar_opiniones.php';
        $.ajax({
           type : "POST",
           url : uri,
           data : 'cdprod='+codproducto,
           datatype: "json",
           success:function(data){
               var array = JSON.parse(data);
               $('#lista_opiniones').html(array[1]);
           }           
        });
        return false;
}
