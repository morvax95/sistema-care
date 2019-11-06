
$(document).ready(function () {
});

function imprimir_persona(element) {
    var rol = $('#rol_persona').val();
    $.redirect(site_url + 'reporte/imprimir_persona', {
        rol_persona: rol
    }, 'POST', '_self');
}
function imprimir_pagos(element) {
    var estado = $('#estado_pagado').val();
    $.redirect(site_url + 'reporte/imprimir_pagos', {
        rol_persona: estado
    }, 'POST', '_self');
}
function imprimir_curso(element) {
    var rol = $('#rol_persona').val();
    $.redirect(site_url + 'reporte/imprimir_curso', {
        rol_persona: rol
    }, 'POST', '_self');
}

//exportar a excel persona
function exportar_excel_personas() {
    var inicio = $('#rol_persona').val();
    $.redirect(site_url + 'reporte/exportar_excel_persona', {
        rol_persona: inicio
    }, 'POST', '_self');
}

//buscar persona
function buscarPersona() {
    var frm = $('#datos_busqueda').serialize();
    console.log(frm);
    $.ajax({
        url: site_url + 'reporte/get_persona',
        data: frm,
        type: 'post',
        success: function (registro) {
            var datos = JSON.parse(registro);
            console.log(datos)

            $('#lista_reporte_ventas tbody').empty();
            $('#lista_reporte_ventas tfoot').empty();
            $.each(datos.datos, function (i, item) {
                $('#lista_reporte_ventas tbody').append(
                    '<tr>' +
                    '<td class="text-center">' + parseFloat(i + 1) + '</td>' +
                    '<td class="text-center">' + item.ci + '</td>' +
                    '<td class="text-center">' + item.nombre + '</td>' +
                    '<td class="text-center">' + item.apellidoPaterno + '</td>' +
                    '<td class="text-center">' + item.telefono + '</td>' +
                    '<td class="text-center">' + item.fechaN + '</td>' +
                    '<td class="text-center">' + item.rol + '</td>' +

                    '</tr>' +
                    '</table>'
                );
            })

        }
    });
}
//buscar deudores
function buscarPagos() {
    var frm = $('#datos_busqueda').serialize();
    console.log(frm);
    $.ajax({
        url: site_url + 'reporte/get_pagos',
        data: frm,
        type: 'post',
        success: function (registro) {
            var datos = JSON.parse(registro);
            console.log(datos)

            $('#lista_reporte_pagos tbody').empty();
            $('#lista_reporte_pagos tfoot').empty();
            $.each(datos.datos, function (i, item) {
                $('#lista_reporte_pagos tbody').append(
                    '<tr>' +
                    '<td class="text-center">' + parseFloat(i + 1) + '</td>' +
                    '<td class="text-center">' + item.ci + '</td>' +
                    '<td class="text-center">' + item.persona + '</td>' +
                    '<td class="text-center">' + item.telefono + '</td>' +
                    '<td class="text-center">' + item.monto + '</td>' +
                    '<td class="text-center">' + item.saldo + '</td>' +
                    '<td class="text-center">' + item.pagado + '</td>' +

                    '</tr>' +
                    '</table>'
                );
            })

        }
    });
}

//exportar a pdf cursos
function imprimir_cursos() {
    var inicio = $('#fecha_inicio').val();
    var fin = $('#fecha_fin').val();
   
    $.redirect(site_url + 'reporte/imprimir_cursos', {
        fecha_inicio: $('#fecha_inicio').val(),
        fecha_fin: $('#fecha_fin').val(),
     
    }, 'POST', '_self');
}

function buscarCurso() {
    var frm = $('#datos_busqueda').serialize();
    $.ajax({
        url: site_url + 'reporte/get_cursos',
        data: frm,
        type: 'post',
        success: function (registro) {
            var datos = JSON.parse(registro);
            console.log(datos)
            if (datos.datos == '') {
                $('#lista_reporte_ventas tbody').append(
                    '<tr>' +
                    '<td colspan="8" style="color: red;font-weight: bold"><em>Datos no entontrados</em></td>' +
                    '</tr>'
                );
            } else {
                $('#lista_reporte_ventas tbody').empty();
                $('#lista_reporte_ventas tfoot').empty();
                $.each(datos.datos, function (i, item) {
                    $('#lista_reporte_ventas tbody').append(
                        '<tr>' +
                        '<td class="text-center">' + parseFloat(i + 1) + '</td>' +
                        '<td class="text-center">' + item.FechaInicio + '</td>' +
                        '<td class="text-center">' + item.alumno + '</td>' +
                        '<td class="text-center">' + item.curso + '</td>' +
                        '<td class="text-center">' + item.aula + '</td>' +
                        '</tr>' +
                        '</table>'
                    );
                });
                $.each(datos.total, function (i, value) {
                    console.log(value)

                })
            }
        }
    });
}



