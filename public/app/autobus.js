$(document).ready(function () {


  $("#datosgraduandos").on("click", ".entregar", function() {
    let id = $(this)[0].id.split("-")[1];
    let autobusId = $(this)[0].id.split("-")[2];

    $.ajax({
      method: "POST",
      url: "consultas/UpdateEntregar",
      data: { id:id,
              autobusId:autobusId 
            },
      BeforeSend: function () {
        $(".loader_bg").show();
      },
      success: function (response) {
        $(".loader_bg").hide();
        console.log(response);
        d = eval("(" + response + ")");
        let txt = "";
         for(i in d){
             txt+='<tr>';
                 txt+='<td scope="col">'+d[i].id+'</td>';
                 txt+='<td scope="col">'+d[i].graduando+'</td>';
                 txt+='<td scope="col">'+d[i].modalidad+'</td>';
                 txt+='<td scope="col">'+d[i].familia.toUpperCase()+'</td>';
                 txt+='<td scope="col">'+d[i].coordinador.toUpperCase()+'</td>';
                 txt+='<td scope="col">'+d[i].localidad.toUpperCase()+'</td>';
                 txt+='<td scope="col">'+((d[i].confirmacion==0)? "SIN PASAR LISTA" : "PRESENTE")+'</td>';
                 txt+='<td scope="col">'+((d[i].entregado==1)?'<span class="fa fa-check"></span>' :'<span id="entergar-'+d[i].id+"-"+d[i].autobusId+'" class="entregar fa fa-times"></span>' )+'</td>';                
             txt+=' </tr>';

            
         }
         $("#datosgraduandos").html(txt);
         $("#cantidad").text("Cantidad: "+d.length);
      },
    });
  });

  $("#datosautobus").on("click", ".ver", function() {
    let id = $(this)[0].id.split("-")[1];

    $.ajax({
      method: "POST",
      url: "consultas/getParticipantesAutobus",
      data: { id: id },
      BeforeSend: function () {
        $(".loader_bg").show();
      },
      success: function (response) {
        $(".loader_bg").hide();
        console.log(response);
        d = eval("(" + response + ")");
        let txt = "";
         for(i in d){
             txt+='<tr>';
                 txt+='<td scope="col">'+d[i].id+'</td>';
                 txt+='<td scope="col">'+d[i].graduando+'</td>';
                 txt+='<td scope="col">'+d[i].modalidad+'</td>';
                 txt+='<td scope="col">'+d[i].familia.toUpperCase()+'</td>';
                 txt+='<td scope="col">'+d[i].coordinador.toUpperCase()+'</td>';
                 txt+='<td scope="col">'+d[i].localidad.toUpperCase()+'</td>';
                 txt+='<td scope="col">'+((d[i].confirmacion==0)? "SIN PASAR LISTA" : "PRESENTE")+'</td>';
                 txt+='<td scope="col">'+((d[i].entregado==1)?'<span class="fa fa-check"></span>' :'<span id="entergar-'+d[i].id+"-"+d[i].autobusId+'" class="entregar fa fa-times"></span>' )+'</td>';                
             txt+=' </tr>';

            
         }
         $("#datosgraduandos").html(txt);
         $("#cantidad").text("Cantidad: "+d.length);
      },
    });
  });

  function getDatos() {
    $.ajax({
      method: "POST",
      url: "consultas/getAutobuses",
      data: {},
      BeforeSend: function () {
        $(".loader_bg").show();
      },
      success: function (response) {
        $(".loader_bg").hide();
        console.log(response);
        d = eval("(" + response + ")");

        let txt = "";
        for (i in d) {
          txt += "<tr>";
          txt += '<td scope="col">' + d[i].id + "</td>";
          txt += '<td scope="col">' + d[i].descripcion + "</td>";
          txt += '<td scope="col">' + d[i].coordinador + "</td>";
          txt += '<td scope="col">' + d[i].telefono1 + "</td>";
          txt += '<td scope="col">' + d[i].localidad.toUpperCase() + "</td>";
          txt += '<td scope="col">' + d[i].total + "</td>";
          txt +='<td class="text-center"><i title="Ver Graduando" id="ver-'+d[i].id+'" class="ver fa fa-eye"></i></td>';

          txt += " </tr>";
        }
        $("#datosautobus").html(txt);
      },
    });
  }

  getDatos();
});
