$(document).ready(function(){
var mes = [31,28,31,30,31,30,31,31,30,31,30,31];
var nommes = ["Ene","Feb","Mar","Abr","May","Jun","jul","Ago","Sep","Oct","Nov","Dic"];


var cuota = 0;

$('#telefono').mask('(000) 000-0000');
$('#movil').mask('(000) 000-0000');
$('#trabajo').mask('(000) 000-0000');
$('#cedula').mask('000-000000-0');


$("input:text,textarea").on("blur","",function(){

  $(this).val($(this).val().toUpperCase());

})


function pagos(p,i,n){
	i = (i/12)/100;
	if(p!=0 && i!=0 && n!=0){
	return  ((p * i) / (1 - Math.pow((1+i),-n))).toFixed(2);
		
	}else{
		return 0;
	}
}

function lineaCredito(m,i){
 i = (i/12)/100;

return (m*i).toFixed(2);

}


function controlInteres(m,i){
   i = (i/12)/100;
   return (m*i).toFixed(2);
}

$("#cuota").on("blur",function(){

if($(this).val()!=""){
 
  var monto=parseInt($("#montosolic").val());
  var plazos=parseInt($("#plazos").val());
  var cuo=parseInt($("#cuota").val());
  var inte=parseInt($("#tasa").val());
  var calc=controlInteres(monto,inte);

	if(cuo>=calc && cuo<=cuota){

	}else{
	alert("La cuota no pueden ser Menor a "+number_format(calc,2)+ " o Mayor a "+number_format(cuota,2));
	$("#cuota").val(cuota);
	$("#cuota").focus();
	}
}


})

function fecha(dias){
	var segundos=dias*86400;
	var fecha = new Date();
  fecha.setSeconds(segundos)
  fec=((fecha.getUTCDate()<=9)? 0 : '')+fecha.getUTCDate()+"-"+nommes[fecha.getMonth()]+"-"+fecha.getFullYear();
  return fec;
}

function interes(m,i){
   i=(i/12)/100;
   return (m*i).toFixed(2);
}



$("#tipop").on("change",function(){

  if($(this).val()=="Especial"){
  	$("#cuota").removeAttr("readonly");
  	$("#cuota").focus();
  }else{
  	$("#cuota").attr("readonly","readonly");
  	
  }


})

function obtenerMes(dias){
   var d = new Date();
   var segundos = (dias*86400);
   d.setSeconds(segundos);
   return d.getMonth(); 
}

$("#calcular").on("click",function(){
  
  var d = new Date();
  var cuo=parseFloat($("#cuota").val()); 
  var p=parseInt($("#plazos").val());
  var mt=parseInt($("#montosolic").val());
  var tasa=parseInt($("#tasa").val());
  var txt="";
  var dias=0;
  var me=obtenerMes(0);
  var balance=mt;
  var linea=0;
  
  if($("#tipop").val()=="Amortizacion"){
        for(var pe=1;pe<=p;pe++){
         if(pe==1 && me<=11){dias+=mes[me];}else if(pe>1 && me<11){dias+=mes[++me];}else{me=0;dias+=mes[me];}
         var inte=interes(balance,tasa);
         var capital=(cuo-inte);
         balance-=capital;
         linea++;
         txt+='<tr  class="text-center '+((linea%2==0)? 'success' : '' )+'">';
         txt+='   <td>'+pe+'</td>';
         txt+='   <td>'+fecha(dias)+'</td>';
         txt+='   <td>'+number_format(cuo,2)+'</td>';
         txt+='   <td>'+number_format(capital,2)+'</td>';
         txt+='   <td>'+number_format(inte,2)+'</td>';
         if(pe==p && balance!=0){
            balance=0;
         }
         txt+='   <td>'+number_format(balance,2)+'</td>';
         txt+='</tr>';
         
      }
  }else{
      for(var pe=1;pe<=p;pe++){
         if(pe==1 && me<=11){dias+=mes[me];}else if(pe>1 && me<11){dias+=mes[++me];}else{me=0;dias+=mes[me];}
         var inte=interes(balance,tasa);
         var capital=0.00;
         linea++;
         txt+='<tr  class="text-center '+((linea%2==0)? 'success' : '' )+'">';
         txt+='   <td>'+pe+'</td>';
         txt+='   <td>'+fecha(dias)+'</td>';
         txt+='   <td>'+number_format(cuo,2)+'</td>';
         if(pe==p){
            capital=balance;
         }
         txt+='   <td>'+number_format(capital,2)+'</td>';
         txt+='   <td>'+number_format(inte,2)+'</td>';
         txt+='   <td>'+number_format(balance,2)+'</td>';
         txt+='</tr>';
         
      }
  }

  
  $("#amortizacion").html(txt);
})




$("#montosolic").on("change",function(){
    var monto=($("#montosolic").val()!="")? parseInt($("#montosolic").val()) : 0;
    var tasa=($("#tasa").val()!="")? parseInt($("#tasa").val()) : 0;
    var plazos=($("#plazos").val()!="")? parseInt($("#plazos").val()) : 0;
	  
    if($("#tipop").val()=="Amortizacion" || $("#tipop").val()=="Especial"){
    
    cuota=pagos(monto,tasa,plazos);
      
    }else{
      
    cuota=lineaCredito(monto,tasa);
    }
	$("#cuota").val(cuota);
})
$("#tasa").on("change",function(){
   var monto=($("#montosolic").val()!="")? parseInt($("#montosolic").val()) : 0;
    var tasa=($("#tasa").val()!="")? parseInt($("#tasa").val()) : 0;
    var plazos=($("#plazos").val()!="")? parseInt($("#plazos").val()) : 0;
	   if($("#tipop").val()=="Amortizacion" || $("#tipop").val()=="Especial"){
    
    cuota=pagos(monto,tasa,plazos);
      
    }else{
      
    cuota=lineaCredito(monto,tasa);
    }
	$("#cuota").val(cuota);
})
$("#plazos").on("change",function(){
    var monto=($("#montosolic").val()!="")? parseInt($("#montosolic").val()) : 0;
    var tasa=($("#tasa").val()!="")? parseInt($("#tasa").val()) : 0;
    var plazos=($("#plazos").val()!="")? parseInt($("#plazos").val()) : 0;
	   if($("#tipop").val()=="Amortizacion" || $("#tipop").val()=="Especial"){
    
    cuota=pagos(monto,tasa,plazos);
      
    }else{
      
    cuota=lineaCredito(monto,tasa);
    }
	$("#cuota").val(cuota);
})
	
})