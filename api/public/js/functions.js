function SoloNumeros(x){
  var permitidos="0123456789";
  var txt="";
      x = x.split("");
  for(k in x){
    if(permitidos.indexOf(x[k])==-1){
      continue;
    }
    txt+=x[k];
  } 
  return txt;  
}

function SoloNumeroLetras(x){
    
  var txt="";
  x=x.split("");
  for(k in x){
    if(!(/^([0-9A-Za-z])*$/.test(x[k]))){
      continue;
    }
    txt+=x[k];
  } 
  return txt;
  
}


function SoloLetras(x){
  var permitidos="0123456789";
  var txt="";
      x=x.split("");
  for(k in x){
    if(permitidos.indexOf(x[k])!=-1){
      continue;
    }
    txt+=x[k];
  } 
  return txt;
}

function escapear(x){
  return escape(x);
}

function eliminar(x) {
        var time = setInterval(function () {
            $('#' + x).text("");
            clearInterval(time);
         
        }, 3000);
}


function formato_moneda(moneda,numeros,deciemales){

  return moneda+" "+parseFloat(numeros.replace(/,/g, ""))
                    .toFixed(deciemales)
                    .toString()
                    .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}