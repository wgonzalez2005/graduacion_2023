
$(document).ready(function(){

    
   
    $("#datosautobus").on("click",".ver",function(e){

        let id = $(this)[0].id.split("-")[1];
     
            $.ajax({
                 method: "POST",
                 url: "consultas/getParticipantesAutobus",
                 data: { id:id },
                 BeforeSend:function(){
                     $('.loader_bg').show();    
                       
                 },success:function(response){
                     $('.loader_bg').hide();
                     console.log(response);
                     d = eval("("+response+")");
                     let txt = "";
                    console.log(d);


                    //  for(i in d){
                    //      txt+='<tr>';
                    //          txt+='<td scope="col">'+d[i].id+'</td>';
                    //          txt+='<td scope="col">'+d[i].cedula+'</td>';
                    //          txt+='<td scope="col">'+d[i].nombre+'</td>';
                    //          txt+='<td scope="col">'+d[i].ocupacion+'</td>';
                    //          txt+='<td scope="col">'+d[i].familia.toUpperCase()+'</td>';
                    //          txt+='<td scope="col">'+d[i].estado+'</td>';
                    //          txt+='<td class="text-center"><i title="'+((d[i].presente==1)? "Participante Presente"  : "Participante Ausente" )+'" id="presente-'+d[i].id+'" class="presente fa '+((d[i].presente==1)? 'fa-check':'fa-window-close' )+'"></i></td>';
                    //      txt+=' </tr>';
                    //  } 
                    //  $("#datosgraduandos").html(txt);
                    //  $("#cantidad").text("Cantidad: "+d.length);
         
                 }
               });

     
     });

function getDatos(){
    
    $.ajax({
        method: "POST",
        url: "consultas/getDatosFamilias",
        data: { },
        BeforeSend:function(){
            $('.loader_bg').show();             
        },success:function(response){
            $('.loader_bg').hide();
            console.log(response);
            d = eval("("+response+")");
            let txt = "";
            for(i in d){
                txt+='<tr>';
                    txt+='<td scope="col">'+d[i].id+'</td>';
                    txt+='<td scope="col">'+d[i].nombre+'</td>';
                    txt+='<th class="text-center" scope="col">'+d[i].total+'</th>';
                    txt+='<th class="text-center" scope="col">'+d[i].Presente+'</th>';
                    txt+='<th class="text-center" scope="col">'+d[i].SinAsistir+'</th>';
                    txt+='<th class="text-center"><i title="Ver" id="ver-'+d[i].id+'" class="ver fa fa-eye"></i></th>';
                txt+=' </tr>';
            } 
            $("#datosfamilias").html(txt);

        }
      });


}

getDatos();




});