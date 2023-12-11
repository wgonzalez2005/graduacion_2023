$(document).ready(function() {
    $("tbody").on("click", ".ahorros", function() {
        var cuenta = $(this)[0].id.split("-")[1];
        var socio = $(this)[0].id.split("-")[2];
        $.ajax({
            url: 'principal/getUltimosAhorros',
            type: 'POST',
            dataType: 'html',
            data: {
                op: 1,
                'cuenta': cuenta,
                'socio': socio
            },
            beforeSend: function() {
                $(".load").show();
            },
            success: function(d) {
                $(".load").hide();
                d = eval("(" + d + ")");
                txt = '';
                for (i in d) {
                    txt += '<tr>';
                    txt += ' <td class="text-center">' + d[i].mov + '</td>';
                    // txt+=' <td class="text-center">'+d[i].cuenta+'</td>';
                    txt += ' <td class="text-center">' + d[i].fecha + '</td>';
                    txt += ' <td class="text-center">' + formato_moneda("RD$", d[i].credito, 2) + '</td>';
                    txt += ' <td class="text-center">' + formato_moneda("RD$", d[i].debito, 2) + '</td>';
                    txt += ' <td class="text-center">' + formato_moneda("RD$", d[i].bal, 2) + '</td>';
                    txt += ' <td class="text-center">' + formato_moneda("RD$", d[i].disp, 2) + '</td>';
                    txt += '</tr>';
                }
                $("#listado-movimientos-ahorros").html(txt);
                $("#verahorros").modal("show");
            }
        })
    })
    $("tbody").on("click", ".aportes", function() {
        var cuenta = $(this)[0].id.split("-")[1];
        var socio = $(this)[0].id.split("-")[2];
        $.ajax({
            url: 'principal/getUltimosAportes',
            type: 'POST',
            dataType: 'html',
            data: {
                op: 2,
                'cuenta': cuenta,
                'socio': socio
            },
            beforeSend: function() {
                $(".load").show();
            },
            success: function(d) {
                $(".load").hide();
                d = eval("(" + d + ")");
                txt = '';
                for (i in d) {
                    txt += '<tr>';
                    txt += ' <td class="text-center">' + d[i].mov + '</td>';
                    // txt+=' <td class="text-center">'+d[i].cuenta+'</td>';
                    txt += ' <td class="text-center">' + d[i].fecha + '</td>';
                    txt += ' <td class="text-center">' + formato_moneda("RD$", d[i].credito, 2) + '</td>';
                    txt += ' <td class="text-center">' + formato_moneda("RD$", d[i].debito, 2) + '</td>';
                    txt += ' <td class="text-center">' + formato_moneda("RD$", d[i].bal, 2) + '</td>';
                    txt += '</tr>';
                }
                $("#listado-movimientos-aportes").html(txt);
                $("#veraportes").modal("show");
            }
        })
    })
    $(document).on("click", ".prestamos", function() {
        var cuenta = $(this)[0].id.split("-")[1];
        var socio = $(this)[0].id.split("-")[2];
        $.ajax({
            url: 'principal/getUltimosPrestamos',
            type: 'POST',
            dataType: 'html',
            data: {
                op: 3,
                'cuenta': cuenta,
                'socio': socio
            },
            beforeSend: function() {
                $(".load").show();
            },
            success: function(d) {
                $(".load").hide();
                d = eval("(" + d + ")");
                txt = '';
                for (i in d) {
                    txt += '<tr>';
                    txt += ' <td class="text-center">' + d[i].mov + '</td>';
                    // txt+=' <td class="text-center">'+d[i].cuenta+'</td>';
                    txt += ' <td class="text-center">' + d[i].fecha + '</td>';
                    txt += ' <td class="text-center">' + formato_moneda("RD$", d[i].monto, 2) + '</td>';
                    txt += ' <td class="text-center">' + formato_moneda("RD$", d[i].mora, 2) + '</td>';
                    txt += ' <td class="text-center">' + formato_moneda("RD$", d[i].interes, 2) + '</td>';
                    txt += ' <td class="text-center">' + formato_moneda("RD$", d[i].capital, 2) + '</td>';
                    // txt+=' <td class="text-center">'+formato_moneda("RD$",d[i].pagado,2)+'</td>';
                    txt += '</tr>';
                }
                $("#listado-movimientos-prestamos").html(txt);
                $("#verprestamos").modal("show");
            }
        })
    })
})