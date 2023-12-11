$(document).ready(function () {

  function getResumenGeneral() {
    $.ajax({
      url: "participantes/getResumenGeneral",
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
        txt = "";
        for (i in d) {         

            txt+="<tr style='font-size:2em;'>";
            txt+="  <td>Totales</td>";
            txt+="  <td>"+ d[i].si+"</td>";
            txt+="  <td>"+ d[i].no+"</td>";
            txt+="  <td>"+ d[i].total+"</td>";
            txt+="</tr>";


        }
        $("#datost").html(txt);
      },
    });
  }
  getResumenGeneral();

  function getResumenCarreras() {
    $.ajax({
      url: "participantes/getResumenCarreras",
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
        txt = "";
        for (i in d) {
          txt+="<tr>";
            txt+="  <td>"+d[i].carrera+"</td>";
            txt+="  <td>"+ d[i].si+"</td>";
            txt+="  <td>"+ d[i].no+"</td>";
            txt+="  <td>"+ d[i].total+"</td>";
            txt+="</tr>";
        }
        $("#datosc").html(txt);
      },
    });
  }
  getResumenCarreras();

  function getResumenProvincias() {
    $.ajax({
      url: "participantes/getResumenProvincias",
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
        txt = "";
        for (i in d) {
          txt+="<tr>";
          txt+="  <td>"+d[i].provincia+"</td>";
          txt+="  <td>"+ d[i].si+"</td>";
          txt+="  <td>"+ d[i].no+"</td>";
          txt+="  <td>"+ d[i].total+"</td>";
          txt+="</tr>";
        }
        $("#datosp").html(txt);
      },
    });
  }
  getResumenProvincias();

  


});
