$(document).ready(function () {
    obtener_persona();

    // registro de rol
    $('#frm_registro_rol').submit(function (event) {
        event.preventDefault();
        $('.error').remove();
        var formulario = $(this);
        var data = formulario.serialize();
        registro_abm(formulario, data);
        formulario[0].reset();
        $('#btn_cerrar_modal_rol').click();
        cargar_rol();
    });
    // registro de aula
    $('#frm_registro_aula').submit(function (event) {
        event.preventDefault();
        $('.error').remove();
        var formulario = $(this);
        var data = formulario.serialize();
        registro_abm(formulario, data);
        formulario[0].reset();
        $('#btn_cerrar_modal_aula').click();
        cargar_aula();
    });


    $('#frm_registrar_cliente').submit(function (event) {
        event.preventDefault();
        var formulario = $(this);
        var data = formulario.serialize();
        registro_abm(formulario, data);
    });

    $('#frm_editar_cliente').submit(function (event) {
        event.preventDefault();
        var formulario = $(this);
        var data = formulario.serialize();
        registro_abm(formulario, data);
        setTimeout(function () {
            location.href = site_url + 'persona/index'
        }, 2000);
    })
});
function cargar_rol() {
    $.post(site_url + "persona/get_rol",
        function (data) {
            $('#rol_persona').empty();
            var datos = JSON.parse(data);
            $.each(datos, function (i, item) {
                $('#rol_persona').append('<option value="' + item.id + '">' + item.nombre + '</option>');
            });
        });
}
function cargar_aula() {
    $.post(site_url + "persona/get_aula",
        function (data) {
            $('#aula_id').empty();
            var datos = JSON.parse(data);
            $.each(datos, function (i, item) {
                $('#aula_id').append('<option value="' + item.id + '">' + item.Nombre + '</option>');
            });
        });
}

function obtener_persona() {
    $('#lista_cliente').DataTable({
        'lengthMenu': [[20, 60, 150, 250, 300], [20, 60, 150, 250, 300]],
        'paging': true,
        'info': true,
        'filter': true,
        'stateSave': true,
        'processing': true,
        'serverSide': true,

        'ajax': {
            "url": site_url + "persona/listar_clientes",
            "type": "post",
        },
        'columns': [
            {data: 'id'},
            {data: 'ci', class: 'text-center'},
            {data: 'nombre', class: 'text-center'},
            {data: 'telefono', class: 'text-center'},
            {data: 'rol', class: 'text-center'},
            {data: 'estado', class: 'text-center'},
            {data: 'rol_id', class: 'text-center'},
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
                render: function (data, type, row) {

                    if (row.estado === '1' && row.rol_id === '2') {
                        return '<a data-toggle="modal" role="button"  onclick="usuarios(this);" class="btn btn-primary btn-xs"><i class="fa fa-user"></i> Usuario</a>&nbsp;&nbsp;'

                    } else {
                        return "<span class='label label-warning '><i class='fa fa-times'></i> Denegado</span>"
                    }

                }

            },
            {
                targets: 6,
                visible: true,
                searchable: false,
                orderable: false,
                data: 'estado',
                render: function (data, type, row) {
                    // estado = 0
                    if (row.estado == 0) {
                        return "<span class='label label-danger'><i class='fa fa-times'></i> Deshabilitado</span>"
                    } else if (row.estado == 0 == 3) {
                        // estado = 3
                        return "<span class='label label-success'><i class='fa fa-check'></i> Habilitado</span>"
                    } else {
                        //estado = 1
                        return "<span class='label label-success'><i class='fa fa-check'></i> Habilitado</span>"
                    }
                }
            },
            {
                targets: 7,
                render: function (data, type, row) {

                    if (row.estado === '1') {
                        return '<a data-toggle="modal" role="button" href="#modal_ver_cliente" onclick="verCliente(this);" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Visualizar</a>&nbsp;&nbsp;' +
                            '<a href="#modal_editar_cliente" data-toggle="modal" onclick="editar(this);"  class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Editar</a>&nbsp;&nbsp;' +
                            '<a onclick="eliminarCliente(this);" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> Eliminar</a>&nbsp;&nbsp;';
                    } else {
                        return '<a onclick="habilitarCliente(this);" class="btn btn-default btn-xs text-black"><i class="fa fa-arrow-up"></i> Habilitar</a>';
                    }
                }
            },
            {
                targets: 3,
                data: "telefono_cliente",
                render: function (data, type, row) {
                    return "<spam style='font-size: 12pt;'><i class='fa fa-phone'></i> &nbsp;" + data + "</spam>"
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
function usuarios(seleccionado) {

    edit_registrer_frm(seleccionado, 'persona/enviar_datos')
}
function editar(seleccionado) {

    edit_registrer_frm(seleccionado, 'persona/editar')

}
//dar de baja a la persona seleccionado
function eliminarCliente(seleccionado) {
    delete_registrer(seleccionado, 'persona/eliminar')
}

/*------------- Funcion para visualizar los datos del persona  --------------------*/
function verCliente(seleccionado) {
    var table = $('#lista_cliente').DataTable();
    var celda = $(seleccionado).parent();
    var rowData = table.row(celda).data();
    var id = rowData['id'];
    var nombre = rowData['nombre'];
    var nit = rowData['ci'];
    var telefono = rowData['telefono'];
    var direccion = rowData['direccion'];
    var email = rowData['correo'];
    var fecha_nacimiento = rowData['fecha_nacimiento'];
    var nombre_contacto = rowData['nombre_contacto'];
    var numero_contacto = rowData['numero_contacto'];

    $('#ver_ci').val(nit);
    $('#ver_telefono').val(telefono);
    $('#ver_nombre').val(nombre);
    $('#ver_direccion').val(direccion);
    $('#ver_email').val(email);
    $('#ver_fecha_nacimiento').val(fecha_nacimiento);
    $('#ver_nombre_contacto').val(nombre_contacto);
    $('#ver_numero_contacto').val(numero_contacto);
}

function habilitarCliente(seleccionado) {
    var table = $('#lista_cliente').DataTable();
    var celda = $(seleccionado).parent();
    var rowData = table.row(celda).data();
    var id = rowData['id'];

    swal({
            title: "HABILITAR PERSONA",
            text: "Está Persona sera reactivado, esta seguro?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si, activar Persona!",
            cancelButtonText: "No deseo activar a la Persona",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function (isConfirm) {
            if (isConfirm) {
                ajaxStart('Guardando datos...');
                $.ajax({
                    url: site_url + 'persona/habilitar',
                    data: 'id_cliente=' + id,
                    type: 'post',
                    success: function (registro) {
                        if (registro == 'error') {
                            ajaxStop();
                            swal("Error", "Problemas al habilitar", "error");
                        } else {
                            ajaxStop();
                            swal("Habilitado!", "La Persona ha sido habilitado.", "success");
                            actualizarDataTable($('#lista_cliente'));
                        }
                    }
                });
            } else {
                swal("Cancelado", "Accion cancelada.", "error");
            }
        });
}


$('#rol_persona').change(function () {
    var valor = $('#rol_persona').val();
    if (valor > 0) {
        $('#div_profesion').show();
    } else {
        $('#div_profesion').hide();
    }
});

