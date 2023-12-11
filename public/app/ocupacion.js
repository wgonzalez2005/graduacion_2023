
$(document).ready(function(){

    
   
    $("#datosocupacion").on("click",".ver",function(e){

        let id = $(this)[0].id.split("-")[1];
     
            $.ajax({
                 method: "POST",
                 url: "consultas/getDatosOcupacionId",
                 data: { id:id },
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
                             txt+='<td scope="col">'+d[i].cedula+'</td>';
                             txt+='<td scope="col">'+d[i].nombre+'</td>';
                             txt+='<td scope="col">'+d[i].ocupacion+'</td>';
                             txt+='<td scope="col">'+d[i].familia.toUpperCase()+'</td>';
                             txt+='<td scope="col">'+d[i].estado+'</td>';
                             txt+='<td class="text-center"><i title="'+((d[i].presente==1)? "Participante Presente"  : "Participante Ausente" )+'" id="presente-'+d[i].id+'" class="presente fa '+((d[i].presente==1)? 'fa-check':'fa-window-close' )+'"></i></td>';
                         txt+=' </tr>';
                     } 
                     $("#datagraduandos").html(txt);
                     $("#cantidad").text("Cantidad: "+d.length);
                 }
               });

     
     });

     $("#datagraduandos").on("click",".fa-check",function(){
        let id = $(this)[0].id.split("-")[1];
     
        $.ajax({
             method: "POST",
             url: "consultas/getGraduandosId",
             data: { id:id },
             BeforeSend:function(){
                 $('.loader_bg').show();           
                   
             },success:function(response){
                 $('.loader_bg').hide();
                 console.log(response);

                 d = eval("("+response+")");
                 let txt = "";
                 $("#titulo").text(d[0].id);
                 $("#nomb").text(d[0].nombre);
                 $("#ocupacion").text(d[0].ocupacion);
                 $("#familia").text(d[0].familia);
                 $("#estado").text(d[0].estado);
                 $('#myModal').modal('show');
                
                  
             }
           });
     
     });


function getDatos(){
    
    $.ajax({
        method: "POST",
        url: "consultas/getDatosOcupacion",
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
            $("#datosocupacion").html(txt);

        }
      });


}

getDatos();




});