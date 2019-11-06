
$(document).ready(function () {
    obtener_curso();


    $('#frm_registrar_curso').submit(function (event) {
        event.preventDefault();
        var formulario = $(this);
        var data = formulario.serialize();
        registro_abm(formulario, data);
    });

    $('#frm_editar_curso').submit(function (event) {
        event.preventDefault();
        var formulario = $(this);
        var data = formulario.serialize();
        registro_abm(formulario, data);
        setTimeout(function () {
            location.href = site_url + 'curso/index'
        }, 2000);
    })
});

function obtener_curso() {
    $('#lista_curso').DataTable({
        'lengthMenu': [[20, 60, 150, 250, 300], [20, 60, 150, 250, 300]],
        'paging': true,
        'info': true,
        'filter': true,
        'stateSave': true,
        'processing': true,
        'serverSide': true,

        'ajax': {
            "url": site_url + "curso/listar_curso",
            "type": "post",
        },
        'columns': [
            {data: 'id'},
            {data: 'nombre', class: 'text-center'},
            {data: 'descripcion', class: 'text-center'},
            {data: 'fechai', class: 'text-center'},
            {data: 'fechaf', class: 'text-center'},
            {data: 'estado', class: 'text-center'},
            {data: 'opciones', class: 'text-center'}
        ],
        "columnDefs": [
            {
                targets: 0,
                visible: false,
                searchable: false,
            },
            {
                target: 1,
                visible: true,
                searchable: false,
                orderable: false,
            },
            {
                target: 2,
                visible: true,
                searchable: false,
                orderable: false,
            },
            {
                target: 3,
                visible: true,
                searchable: false,
                orderable: false,
            },
            {
                target: 4,
                visible: true,
                searchable: false,
                orderable: false,
            },
            {
                targets: 5,
                visible: true,
                searchable: false,
                orderable: false,
                data: 'estado',
                render: function (data, type, row) {
                    // estado = 0
                    if (data == 0) {
                        return "<span class='label label-danger'><i class='fa fa-times'></i> Deshabilitado</span>"
                    } else if (data == 3) {
                        // estado = 3
                        return "<span class='label label-success'><i class='fa fa-check'></i> Habilitado</span>"
                    } else {
                        //estado = 1
                        return "<span class='label label-success'><i class='fa fa-check'></i> Habilitado</span>"
                    }
                }
            },
            {
                targets: 6,
                render: function (data, type, row) {

                    if (row.estado === '1') {
                        return '<a data-toggle="modal" role="button" href="#modal_ver_cliente" onclick="verCurso(this);" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Ver</a>&nbsp;&nbsp;' +
                            '<a href="#modal_editar_cliente" data-toggle="modal" onclick="editar(this);" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Editar</a>&nbsp;&nbsp;' +
                            '<a onclick="eliminarCurso(this);" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> Eliminar</a>&nbsp;&nbsp;';
                    } else {
                        return '<a onclick="habilitarCurso(this);" class="btn btn-default btn-xs text-black"><i class="fa fa-arrow-up"></i> Habilitar</a>';
                    }
                }
            },

            {
                targets: 2,
                data: "nombre",
                render: function (data, type, row) {
                    return "<spam style='color:#0d6aad; font-weight: bold;'> " + data + "</spam>"
                }
            }
        ],
        "order": [[1, "asc"]],
    });
}
/*------------- Funcion para visualizar los datos del curso  --------------------*/
function verCurso(seleccionado) {
    var table = $('#lista_curso').DataTable();
    var celda = $(seleccionado).parent();
    var rowData = table.row(celda).data();
    var id = rowData['id'];
    var nombre = rowData['nombre'];
    var descripcion = rowData['descripcion'];
    var fechainicio = rowData['fechai'];
    var fechafin = rowData['fechaf'];


    $('#ver_nombre').val(nombre);
    $('#ver_descripcion').val(descripcion);
    $('#ver_fecha_inicio').val(fechainicio);
    $('#ver_fecha_fin').val(fechafin);

}

function editar(seleccionado) {
    edit_registrer_frm(seleccionado, 'curso/editar')
}
function eliminarCurso(seleccionado) {
    delete_registrer(seleccionado, 'curso/eliminar')
}


function habilitarCurso(seleccionado) {
    var table = $('#lista_curso').DataTable();
    var celda = $(seleccionado).parent();
    var rowData = table.row(celda).data();
    var id = rowData['id'];

    swal({
            title: "HABILITAR CURSO",
            text: "Este curso sera reactivado, esta seguro?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si, activar curso!",
            cancelButtonText: "No deseo activar a la curso",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function (isConfirm) {
            if (isConfirm) {
                ajaxStart('Guardando datos...');
                $.ajax({
                    url: site_url + 'curso/habilitar',
                    data: 'id_cliente=' + id,
                    type: 'post',
                    success: function (registro) {
                        if (registro == 'error') {
                            ajaxStop();
                            swal("Error", "Problemas al habilitar", "error");
                        } else {
                            ajaxStop();
                            swal("Habilitado!", "el curso ha sido habilitado.", "success");
                            actualizarDataTable($('#lista_curso'));
                        }
                    }
                });
            } else {
                swal("Cancelado", "Accion cancelada.", "error");
            }
        });
}

