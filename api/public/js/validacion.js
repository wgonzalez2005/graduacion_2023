$(document).ready(function () {
  function getCarreras() {
    $.ajax({
      url: "participantes/getCarreras",
      type: "POST",
      dataType: "html",
      data: {
        op: 1,
      },
      beforeSend: function () {
        $(".load").show();
      },
      success: function (d) {
        $(".load").hide();
        d = eval("(" + d + ")");
        txt = "<option>---SELECCIONE UNA CARRERA---</option>";
        for (i in d) {
          txt +=
            '<option value="' + d[i].carrera +'">' + d[i].carrera +" ( "+d[i].total+" )" + "</option>";
        }
        $("#carreras").html(txt);
      },
    });
  }
  getCarreras();

  function getProvincias() {
    $.ajax({
      url: "participantes/getProvincias",
      type: "POST",
      dataType: "html",
      data: {
        op: 1,
      },
      beforeSend: function () {
        $(".load").show();
      },
      success: function (d) {
        $(".load").hide();
        d = eval("(" + d + ")");
        txt = "<option>---SELECCIONE UNA PROVINCIA---</option>";
        for (i in d) {
          txt += '<option value="' + d[i].provincia +'">' + d[i].provincia +" ( "+d[i].total+" )"+ "</option>";
        }
        $("#provincias").html(txt);
      },
    });
  }
  getProvincias();


  $("#carreras").on("change",function(){
    cargarCarreras();
    getProvincias();
  });

  
  $("#provincias").on("change",function(){
   
    cargarProvincias();
    getCarreras();

  });

 function cargarCarreras(){
    let carrera= $("#carreras").val();
    console.log(carrera);
    $.ajax({
        url: "participantes/getParticipantes",
        type: "POST",
        dataType: "html",
        data: {
           op:1, 
          valor:carrera,
        },
        beforeSend: function () {
          $(".load").show();
        },
        success: function (d) {
          $(".load").hide();
          d = eval("(" + d + ")");
          txt = "";
          for (i in d) {
            txt+="<tr>";
            txt+="  <td>"+d[i].id+"</td>";
            txt+="  <td>"+((d[i].cedula==null)? d[i].pasaporte:d[i].cedula)+"</td>";
            txt+="  <td>"+d[i].nombre+"</td>";
            txt+="  <td>"+d[i].sexo+"</td>";
            txt+="  <td>"+d[i].whatsapp+"</td>";
            txt+="  <td>"+((d[i].movil==null)? "" :d[i].movil)+"</td>";
            txt+="  <td>"+((d[i].email==null)? "" :d[i].email)+"</td>";
            txt+="  <td>"+d[i].provincia+"</td>";
            txt+="  <td>"+d[i].carrera+"</td>";
            txt+="  <td>"+d[i].nacionalidad+"</td>";           
            txt+="  <td>"+((d[i].confirmacion==0)? '<button type="submit" id="id-'+d[i].id+"|"+((d[i].cedula==null)? d[i].pasaporte : d[i].cedula)+"|"+((d[i].cedula==null)? 2 : 1)+'" class="si btn btn-success">SI</button>&nbsp;<button type="submit" id="id-'+d[i].id+"|"+((d[i].cedula==null)? d[i].pasaporte : d[i].cedula)+"|"+((d[i].cedula==null)? 2 : 1)+'" class="no btn btn-danger">NO</button>' :((d[i].confirmacion==1)? '<span class="glyphicon glyphicon-ok"></span>': '<span class="glyphicon glyphicon-remove"></span>'))+"</td>";
            txt+="  <td>"+d[i].usuario+"</td>";    
            txt+="</tr>";
          }
          $("#datos").html(txt);
        },
      });
 }


  function cargarProvincias(){
    let provincia= $("#provincias").val();
    $.ajax({
        url: "participantes/getParticipantes",
        type: "POST",
        dataType: "html",
        data: {
           op:2, 
          valor:provincia,
        },
        beforeSend: function () {
          $(".load").show();
        },
        success: function (d) {
          $(".load").hide();
          d = eval("(" + d + ")");
          txt = "";
          for (i in d) {
            txt+="<tr>";
            txt+="  <td>"+d[i].id+"</td>";
            txt+="  <td>"+((d[i].cedula==null)? d[i].pasaporte:d[i].cedula)+"</td>";
            txt+="  <td>"+d[i].nombre+"</td>";
            txt+="  <td>"+d[i].sexo+"</td>";
            txt+="  <td>"+d[i].whatsapp+"</td>";
            txt+="  <td>"+((d[i].movil==null)? "" :d[i].movil)+"</td>";
            txt+="  <td>"+((d[i].email==null)? "" :d[i].email)+"</td>";
            txt+="  <td>"+d[i].provincia+"</td>";
            txt+="  <td>"+d[i].carrera+"</td>";
            txt+="  <td>"+d[i].nacionalidad+"</td>";           
            txt+="  <td>"+((d[i].confirmacion==0)? '<button type="submit" id="id-'+d[i].id+"|"+((d[i].cedula==null)? d[i].pasaporte : d[i].cedula)+"|"+((d[i].cedula==null)? 2 : 1)+'" class="si btn btn-success">SI</button>&nbsp;<button type="submit" id="id-'+d[i].id+"|"+((d[i].cedula==null)? d[i].pasaporte : d[i].cedula)+"|"+((d[i].cedula==null)? 2 : 1)+'" class="no btn btn-danger">NO</button>' :((d[i].confirmacion==1)? '<span class="glyphicon glyphicon-ok"></span>': '<span class="glyphicon glyphicon-remove"></span>'))+"</td>";
            txt+="  <td>"+d[i].usuario+"</td>";  
            txt+="</tr>";
          }
          $("#datos").html(txt);
        },
      });
  }


  $("#datos").on("click",".si",function(){
    console.log($(this)[0].id);

    let op = (($("#carreras").val()=="")? 2 : 1);
    let valor=(($("#carreras").val()=="")?  $("#provincias").val() : $("#carreras").val());
    let cedula=$(this)[0].id.split("|")[1];
    let tipo = $(this)[0].id.split("|")[2];


    $.ajax({
        url: "participantes/UpdateParticipantes",
        type: "POST",
        dataType: "html",
        data: {
           op:op, 
           valor:valor,          
           estado:1,
           cedula:cedula,
           tipo:tipo           
        },
        beforeSend: function () {
          $(".load").show();
        },
        success: function (d) {
          $(".load").hide();
          d = eval("(" + d + ")");
          txt = "";
          for (i in d) {
            txt+="<tr>";
            txt+="  <td>"+d[i].id+"</td>";
            txt+="  <td>"+((d[i].cedula==null)? d[i].pasaporte:d[i].cedula)+"</td>";
            txt+="  <td>"+d[i].nombre+"</td>";
            txt+="  <td>"+d[i].sexo+"</td>";
            txt+="  <td>"+d[i].whatsapp+"</td>";
            txt+="  <td>"+((d[i].movil==null)? "" :d[i].movil)+"</td>";
            txt+="  <td>"+((d[i].email==null)? "" :d[i].email)+"</td>";
            txt+="  <td>"+d[i].provincia+"</td>";
            txt+="  <td>"+d[i].carrera+"</td>";
            txt+="  <td>"+d[i].nacionalidad+"</td>";           
            txt+="  <td>"+((d[i].confirmacion==0)? '<button type="submit" id="id-'+d[i].id+"|"+((d[i].cedula==null)? d[i].pasaporte : d[i].cedula)+"|"+((d[i].cedula==null)? 2 : 1)+'" class="si btn btn-success">SI</button>&nbsp;<button type="submit" id="id-'+d[i].id+"|"+((d[i].cedula==null)? d[i].pasaporte : d[i].cedula)+"|"+((d[i].cedula==null)? 2 : 1)+'" class="no btn btn-danger">NO</button>' :((d[i].confirmacion==1)? '<span class="glyphicon glyphicon-ok"></span>': '<span class="glyphicon glyphicon-remove"></span>'))+"</td>";
            txt+="  <td>"+d[i].usuario+"</td>";  
            txt+="</tr>";
          }
          $("#datos").html(txt);
        },
      });

  })

  $("#datos").on("click",".no",function(){
    
    let op = (($("#carreras").val()=="")? 2 : 1);
    let valor=(($("#carreras").val()=="")?  $("#provincias").val() : $("#carreras").val());
    let cedula=$(this)[0].id.split("|")[1];
    let tipo = $(this)[0].id.split("|")[2];
console.log(tipo);
console.log($(this)[0].id);
    $.ajax({
        url: "participantes/UpdateParticipantes",
        type: "POST",
        dataType: "html",
        data: {
           op:op, 
           valor:valor,          
           estado:2,
           cedula:cedula,
           tipo:tipo           
        },
        beforeSend: function () {
          $(".load").show();
        },
        success: function (d) {
          $(".load").hide();
          d = eval("(" + d + ")");
          txt = "";
          for (i in d) {
            txt+="<tr>";
            txt+="  <td>"+d[i].id+"</td>";
            txt+="  <td>"+((d[i].cedula==null)? d[i].pasaporte:d[i].cedula)+"</td>";
            txt+="  <td>"+d[i].nombre+"</td>";
            txt+="  <td>"+d[i].sexo+"</td>";
            txt+="  <td>"+d[i].whatsapp+"</td>";
            txt+="  <td>"+((d[i].movil==null)? "" :d[i].movil)+"</td>";
            txt+="  <td>"+((d[i].email==null)? "" :d[i].email)+"</td>";
            txt+="  <td>"+d[i].provincia+"</td>";
            txt+="  <td>"+d[i].carrera+"</td>";
            txt+="  <td>"+d[i].nacionalidad+"</td>";           
            txt+="  <td>"+((d[i].confirmacion==0)? '<button type="submit" id="id-'+d[i].id+"|"+((d[i].cedula==null)? d[i].pasaporte : d[i].cedula)+"|"+((d[i].cedula==null)? 2 : 1)+'" class="si btn btn-success">SI</button>&nbsp;<button type="submit" id="id-'+d[i].id+"|"+((d[i].cedula==null)? d[i].pasaporte : d[i].cedula)+"|"+((d[i].cedula==null)? 2 : 1)+'" class="no btn btn-danger">NO</button>' :((d[i].confirmacion==1)? '<span class="glyphicon glyphicon-ok"></span>': '<span class="glyphicon glyphicon-remove"></span>'))+"</td>";
            txt+="  <td>"+d[i].usuario+"</td>";  
            txt+="</tr>";
          }
          $("#datos").html(txt);
        },
      });

  })


});
