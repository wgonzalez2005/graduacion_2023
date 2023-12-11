$(document).ready(function(){


$("#formularios").submit(function(e){

var actual=$("#actual").val();
var nueva =$("#nueva").val();
var repite  =$("#repite").val();

if(actual==""){$("#mensaje").text("Debes digitar la contraseña actual");$("#actual").focus();eliminar("mensaje");return false;}
if(nueva==""){$("#mensaje").text("Debes digitar la contraseña nueva");$("#nueva").focus();eliminar("mensaje");return false;}
if(repite==""){$("#mensaje").text("Debes repetir la contraseña nueva");$("#repite").focus();eliminar("mensaje");return false;}

})


$("#repite").on("blur",function(){

  if($("#nueva").val()!=$("#repite").val()){
    $("#mensaje").text("Contraseñas no coinciden");
    $("#nueva").val("");
    $("#repite").val("");
    $("#nueva").focus();
    eliminar("mensaje");
    return false;
  }



})


$("#actual").on("keyup",function(){

   $(this).val(SoloNumeroLetras($(this).val()));
   
})


$("#nueva").on("keyup",function(){

   $(this).val(SoloNumeroLetras($(this).val()));
   
})

$("#repite").on("keyup",function(){

   $(this).val(SoloNumeroLetras($(this).val()));
   
})




})