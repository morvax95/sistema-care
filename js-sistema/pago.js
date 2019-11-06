$(document).ready(function () {

    $('#monto_pagar').keyup(function () {
        var total_deuda = parseFloat($('#total').val());
        var saldo = parseFloat($('#saldo').val());
        var valor = parseFloat($('#monto_pagar').val());
        if ($('#monto_pagar').val() == "") {
            rellenarCero($('#monto_pagar'));
            valor = 0.00;
        }
        total = total_deuda - valor
        $('#saldo').val(total.toFixed(2));
    });

    $('#frm_pago_deuda').submit(function (e) {
        e.preventDefault();

        if ($('#monto_pagar').val() == '' || $('#monto_pagar').val() == 0) {
            swal('Ingrese el monto a pagar correctamente', '', 'warning');
            return true;
        }

        if ($('#saldo').val()  < 0  ) {
            swal('El monto debe ser menor al saldo', '', 'warning');
            return true;
        }
        
        var frm = $('#frm_pago_deuda');
        var formData = $(frm).serialize();
        registro_abm(frm, formData);
        $('#frm_pago_deuda')[0].reset();
        $('#btn_cerrar_modal_pagos').click();
        $('#lista_deudas').DataTable().ajax.reload();
       
    });
});

function rellenarCero(elemento) {
    elemento.val('0.00');
}

function listar_deudas() {
    $('#lista_deudas').DataTable({
        'lengthMenu': [[20, 60, 150, 250, 300], [20, 60, 150, 250, 300]],
        'paging': true,
        'info': true,
        'filter': true,
        'stateSave': true,

        'ajax': {
            "url": site_url + 'pago/get_all_debts',
            "type": 'post',
            "dataSrc": ''
        },
        'columns': [
            {data: 'id'},
            {data: 'fecha_servicio', 'class': 'text-center'},
            {data: 'persona', 'class': 'text-center'},
            {data: 'monto', 'class': 'text-center'},
            {data: 'saldo', 'class': 'text-center'},
            {data: 'pagado', 'class': 'text-center'},
            {data: 'estado', 'class': 'text-center'},
            {data: 'estado', 'class': 'text-center'},
            {data: 'estado', 'class': 'text-center'}
        ],
        "columnDefs": [
            {
                targets: 0,
                visible: false,
                searchable: false,
            },
            {
                // total
                targets: 3,
                searchable: false,
            },
            {
                // saldo
                targets: 4,
                searchable: false,
            },
            {
                // Estado
                targets: 6,
                searchable: false,
            },
            {
                // Opciones
                targets: 7,
                searchable: false,
                orderable: false,
                render: function (data, type, row) {
                    if (row.estado === 'Debe') {
                        return '<a href="#modal_pago_deuda" onclick="obtener_datos(this)" data-toggle="modal" class="btn btn-success btn-sm"><i class="fa fa-dollar"></i> Pagar</a>'
                    } else {
                        return '';
                    }
                }
            }, {
                targets: 8,
                searchable: false,
                orderable: false,
                render: function (data, type, row) {
                    if (row.nombre_cliente != 'ANULADO') {
                        if (row.estado != '2') {
                            return '<a role="button"  onclick="reimprimir_nota_pago(this);"  ><img width="30" height="30" src="' + base_url + '/assets/img/imprimir.png" title="Buscar"></a>&nbsp;&nbsp;';
                           // return '<a role="button"    ><img width="30" height="30" src="' + base_url + '/assets/img/imprimir.png" title="Buscar"></a>&nbsp;&nbsp;';
                        } else {
                            return '<label style="color: red;"><b>Está anulado</b></label>';
                        }
                    }
                }
            },

            {
                targets: 2,
                data: "nombre_cliente",
                render: function (data, type, row) {
                    return "<spam style='color:#0d6aad; font-weight: bold;'> " + data + "</spam>"
                }
            }
        ],
        "order": [[0, "asc"]],
    });
}
/**/

function reimprimir_nota_pago(seleccionado) {
    var table = $('#lista_deudas').DataTable();
    var celda = $(seleccionado).parent();
    var rowData = table.row(celda).data();
    var id = rowData['id']
    actualizarDataTable($('#lista_deudas'));
    mostrar_ventana_consulta(site_url + 'pago/imprimir_nota_pago/' + id, 'Nota de Venta', '1000', '700');//para imprimir en tamaño carta el comprobante de venta
   

}

function mostrar_ventana_consulta(url, title, w, h) {
    var left = 200;
    var top = 50;

    window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
}

function obtener_datos(seleccionado) {
    var table = $(seleccionado).closest('table').DataTable();
    var current_row = $(seleccionado).parents('tr');
    if (current_row.hasClass('child')) {
        current_row = current_row.prev();
    }
    var data = table.row(current_row).data();
    console.log(data);
    $('#estudiante').val(data['persona']);
    $('#fecha_servicio').val(data['fecha_servicio']);
    $('#saldo').val(data['pagado']);
    $('#total').val(data['pagado']);
    $('#venta_id').val(data['cursoid']);
    actualizarDataTable($('#lista_deudas'));
}
function verificar_validacion(){

}