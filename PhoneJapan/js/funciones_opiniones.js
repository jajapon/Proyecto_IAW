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

function insertarOpinion(){
     var uri = './php/insertar_opinion.php';
     if($("#addComment").val()!="" && $("#cdprod").val()!="" ){
        var mensaje= $("#addComment").val();
        var codprod= $("#cdprod").val();
        var arraydatos={"addComment":mensaje,"codprod":codprod};
        $.ajax({
           type : "POST",
           url : uri,
           data : arraydatos,
           datatype: "json",
           success:function(data){
                listarOpiniones(codprod);   
           }           
        });
        return false;       
     }
     //var arraydatos={"codopi":codopinion,"codprod":codproducto};
}
