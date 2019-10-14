function consultar() {
    //alert($("#fecha").val());
   if ($("#fecha").val()!="") {
        $.ajax({
             type: "POST",
             url: "consultar_fecha.php",
             data: "fecha="+$("#fecha").val(),
             beforeSend: function() {
                $("#resultado").html("<img src='imagenes/ajax-loader.gif'></img>");   
             },
             error: function() {
                 alert("Hubo un error al ejecutar AJAX");
             },
             success: function(data){
                 setTimeout(
                         function(){
                             $("#resultado").html(data);
                         }, 2000
                 );
                 
             }
         });
    }
    else
        alert("Debe ingresar fecha");
}


