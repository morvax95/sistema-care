$(document).ready(function () {
    listar_items();
});

//Lista todos los comprobantes de los estudiantes
function listar_items() {
    $('#lista_nota').DataTable({
        'paging': true,
        'info': true,
        'filter': true,
        'stateSave': true,
        'responsive': true,
        'processing': true,
        'serverSide': true,

        'ajax': {
            "url": site_url + "ConsultarCurso/get_all_data",
            "type": "post",
            // dataSrc: ''
        },
        'columns': [
            {data: 'id'},
            {data: 'id', class: 'text-center'},
            {data: 'curso', class: 'text-center'},
            {data: 'turno', class: 'text-center'},
            {data: 'fecha', class: 'text-center'},
            {data: 'aula', class: 'text-center'},
            {data: 'fecha_solicitud', class: 'text-center'},
        ],
        "columnDefs": [
            {
                targets: 0,
                visible: false,
                searchable: false,
            }, {
                targets: 5,
                searchable: false,
                orderable: false,
                render: function (data, type, row) {
                    if (row.nombre_cliente != 'ANULADO') {
                        if (row.estado != '2') {
                            return '<a role="button"  onclick="imprimir_Gestioncurso(this)"  ><img width="30" height="30" src="' + base_url + '/assets/img/imprimir.png" title="Buscar"></a>&nbsp;&nbsp;';
                        } else {
                            return '<label style="color: red;"><b>Esta anulado</b></label>';
                        }
                    }
                }
            },
            {
                targets: 6,
                searchable: false,
                orderable: false,
                render: function (data, type, row) {
                    if (row.nombre_cliente != 'ANULADO') {
                        if (row.estado != '2') {
                            return '<a data-toggle="modal" role="button" onclick="ver_registro(this) " class="btn btn-success btn-xs"><i class="fa fa-eye"></i> VER CURSO</a>&nbsp;&nbsp;'
                        } else {
                            return '<label style="color: red;"><b>Esta anulado</b></label>';
                        }
                    }
                    return '<label style="color: red;"><b>Esta anulado</b></label>';
                }
            }, {
                targets: 2,
                data: "usuario",
                render: function (data, type, row) {
                    return "<spam style='color:#0d6aad; font-weight: bold;'> " + data + "</spam>"
                }
            }
        ],
        "order": [[0, "desc"]],
    });

}
function ver_registro(seleccionado) {
    var table = $(seleccionado).closest('table').DataTable();
    var current_row = $(seleccionado).parents('tr');
    if (current_row.hasClass('child')) {
        current_row = current_row.prev();
    }
    var data = table.row(current_row).data();
    $.redirect(site_url + 'consultarCurso/ver_datos_solitud', {id: data['id']}, 'POST', '_self');
}


function imprimir_Gestioncurso(seleccionado) {
    var table = $('#lista_nota').DataTable();
    var celda = $(seleccionado).parent();
    var rowData = table.row(celda).data();
    var id = rowData['id']

    mostrar_ventana_consulta(site_url + 'consultarCurso/imprimir_gestionCurso/' + id, 'Nota de Solicitud', '1000', '700');
}


function mostrar_ventana_consulta(url, title, w, h) {
    var left = 200;
    var top = 50;

    window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
}


