
$(document).ready(function(){

    
    $("#buscar").on("keyup",function(e){

        if(e.which == 13){
            let bus = $(this).val();
     
            $.ajax({
                 method: "POST",
                 url: "consultas/BuscarGraduandos",
                 data: { bus:bus },
                 BeforeSend:function(){
                     $('.loader_bg').show();    
                       
                 },success:function(response){
                     $('.loader_bg').hide();
                     d = eval("("+response+")");
            ;          
                     let txt="";
                     for(i in d){
                         txt+='<tr>';
                             txt+='<td scope="col">'+d[i].id+'</td>';
                             txt+='<td scope="col">'+d[i].graduando+'</td>';
                             txt+='<td scope="col">'+d[i].modalidad+'</td>';
                             txt+='<td scope="col">'+d[i].familia.toUpperCase()+'</td>';
                             txt+='<td scope="col">'+((d[i].autobus!=null)? d[i].autobus.toUpperCase():"")+'</td>';
                             txt+='<td scope="col">'+((d[i].coordinador!=null)? d[i].coordinador.toUpperCase():"")+'</td>';
                             txt+='<td scope="col">'+((d[i].telefono!=null)? d[i].telefono.toUpperCase():"")+'</td>';
                             txt+='<td scope="col">'+((d[i].localidad!=null)? d[i].localidad.toUpperCase():"")+'</td>';
                             txt+='<td scope="col">'+d[i].estado+'</td>';
                             txt+='<td scope="col">'+((d[i].entregado==1)?'<span class="fa fa-check"></span>' :'<span id="entergar-'+d[i].id+'" class="entregar fa fa-times"></span>' )+'</td>';                
                             txt+=' </tr>';
                     } 
            
                     $("#datagraduandos").html(txt);
                     $("#cantidad").text("Cantidad: "+d.length);
         
                 }
               });
        }

     
     });




$("#datagraduandos").on("click",".entregar",function(){
   let id = $(this)[0].id.split("-")[1];
  let bus = $("#buscar").val();
alert(id);
alert(bus);

               $.ajax({
                 method: "POST",
                 url: "consultas/UpdateEntregar2",
                 data: { id:id,bus:bus },
                 BeforeSend:function(){
                     $('.loader_bg').show();    
                       
                 },success:function(response){
                     $('.loader_bg').hide();
                     d = eval("("+response+")");
                     console.log(d);          
                     let txt="";
                     for(i in d){
                         txt+='<tr>';
                             txt+='<td scope="col">'+d[i].id+'</td>';
                             txt+='<td scope="col">'+d[i].graduando+'</td>';
                             txt+='<td scope="col">'+d[i].modalidad+'</td>';
                             txt+='<td scope="col">'+d[i].familia.toUpperCase()+'</td>';
                             txt+='<td scope="col">'+((d[i].autobus!=null)? d[i].autobus.toUpperCase():"")+'</td>';
                             txt+='<td scope="col">'+((d[i].coordinador!=null)? d[i].coordinador.toUpperCase():"")+'</td>';
                             txt+='<td scope="col">'+((d[i].telefono!=null)? d[i].telefono.toUpperCase():"")+'</td>';
                             txt+='<td scope="col">'+((d[i].localidad!=null)? d[i].localidad.toUpperCase():"")+'</td>';
                             txt+='<td scope="col">'+d[i].estado+'</td>';
                             txt+='<td scope="col">'+((d[i].entregado==1)?'<span class="fa fa-check"></span>' :'<span id="entergar-'+d[i].id+'" class="entregar fa fa-times"></span>' )+'</td>';                
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

// function getDatos(){
    
//     $.ajax({
//         method: "POST",
//         url: "consultas/getDatos",
//         data: { },
//         BeforeSend:function(){
//             $('.loader_bg').show();             
//         },success:function(response){
//             $('.loader_bg').hide();
//             console.log(response);
//             d = eval("("+response+")");
//             let txt = "";
//             for(i in d){
//                 txt+='<tr>';
//                     txt+='<td scope="col">'+d[i].id+'</td>';
//                     txt+='<td scope="col">'+d[i].cedula+'</td>';
//                     txt+='<td scope="col">'+d[i].nombre+'</td>';
//                     txt+='<td scope="col">'+d[i].ocupacion+'</td>';
//                     txt+='<td scope="col">'+d[i].familia.toUpperCase()+'</td>';
//                     txt+='<td scope="col">'+d[i].estado+'</td>';
//                     txt+='<td class="text-center"><i title="'+((d[i].presente==1)? "Participante Presente"  : "Participante Ausente" )+'" id="presente-'+d[i].id+'" class="presente fa '+((d[i].presente==1)? 'fa-check':'fa-window-close' )+'"></i></td>';
//                 txt+=' </tr>';
//             } 
//             $("#datagraduandos").html(txt);
//             $("#cantidad").text("Cantidad: "+d.length);

//         }
//       });


// }

// getDatos();




});