import * as appMethods from './common';

$(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
    
    let usersUrl = "/userdata/"+$('#idUser').val()+"/";

    usersDatatable = $('#usersTable').DataTable({
        stateSave: true,
        dom: 'frtip',
        responsive: true,
        order: [[ 0, 'asc' ], [ 1, 'asc' ]],
        bLengthChange: false,
        pageLength: 20,
        language: {
            //url: "/js/datatables/es.json",
            decimal: "",
            emptyTable: "No hay ninguna información",
            info: "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            infoEmpty: "Mostrando 0 a 0 de 0 Entradas",
            infoFiltered: "(Filtrado de _MAX_ total entradas)",
            infoPostFix: "",
            thousands: ",",
            lengthMenu: "Mostrar _MENU_ Entradas",
            loadingRecords: "Cargando...",
            processing: "Procesando...",
            search: 'Buscar:', 
            searchPlaceholder: "buscar por fecha,correo,sala...",
            zeroRecords: "Sin resultados encontrados",
            paginate: {
                first: "Primero",
                last: "Ultimo",
                next: "Siguiente",
                previous: "Anterior"
            }

        },
        ajax: {
            url: usersUrl,
            type: "GET"
        },
                columnDefs: [
                    {
                targets: 4,
                className: 'dt-actions'
            }
        ],
        columns: [
            { 
                data: "name",
                render: setEditUserButton
            },
            { data: "dni" },
            { data: "email" },
            { data: "nombreRol" },
            { 
                data: "actions",
                render: setActionButtons
            }
        ],
        initComplete: function(settings, json) {
            $('a[id^="btnConfirmDelete_"]').click(confirmDelete);
        }
    });
    /*
    usersDatatable.on('search.dt', function(e, settings) {
        var api = new $.fn.dataTable.Api( settings );
        var state = api.state();
        usersDatatable.state.save();
    
    });      
    */
    
    $('#updateUser').on("click",updateUsuario);
    if ($('#delRegister').length) {
        $('#delRegister button.btn-modalAccept').on("click",deleteUserRegister);
    }
   
    $('#new_user').on('click', function(){
        window.location.replace('createNewUser');
    });
    
    usersDatatable.on('click', 'a[id^=btnConfirmDelete_]', function(){
        $(this).on("click",confirmDelete);
    });  
             
});

var usersDatatable = null;

function setActionButtons(data, type, row) {
    return '<a href="#" id="btnConfirmDelete_' + row.DT_RowId + '" data-id="' + row.DT_RowId + '"><i class="material-icons">delete</i></a>';
}

function setEditUserButton (data, type, row) {
    return '<a href="/usuario/' + row.DT_RowId + '" class="action-icons">' + row.name + '</a>';
}

function confirmDelete(e) {
    e.preventDefault();

    $('#delRegister button.btn-modalAccept').data('id', $(this).data('id'));
    $('#delRegister button.btn-modalAccept').data('url', '/usuario/eliminar');
    $('#delRegister').modal('show');
}

function updateUsuario(e) {
   // let origin = $(e.target).closest('form').attr('name');
    axios.post($(e.target).closest('form').attr('action'), {
        'data': $(e.target).closest('form').serialize()
    })
    .then(function(response) {
//        console.log(response);
        if (response.data.error.length == 0) {
            $.each($('.invalid-feedback'), function (key, element) {
                $(element).html('');
                $(element).hide();
            });
            appMethods.showNotify('success', response.data.message);
           // if(origin === 'createUser'){
                window.location.replace('/usuarios');                    
            //} else { location.reload(); }                
        }
        else {
            $.each($('.invalid-feedback'), function (key, element) {
                $(element).html('');
                $(element).hide();
            });

            $.each(response.data.error, function (key, element) {
                for(var i = 0; i < element.length; i++) {
                    if ((element[i].toUpperCase().indexOf('CONFIRMACIÓN') != -1) || (element[i].toUpperCase().indexOf('CONFIRMACION') != -1)) {
                        $(('#invalid-feedback-' + key + '_confirmation')).html(element[i]);
                        $(('#invalid-feedback-' + key + '_confirmation')).show();
                        element.splice(i, 1);
                    }
                    break;
                }

                $(('#invalid-feedback-' + key)).html(element.join('<br>'));
                $(('#invalid-feedback-' + key)).show();
            });
            //appMethods.showNotify('danger', response.data.message);
        }
    })
    .catch(function (error) {
        appMethods.showNotify('danger', error);
    })
    .then(function () {
        //$(e.target).prop('disabled', false);
    });
}

function deleteUserRegister(e) {
    $('#delRegister button.btn-modalAccept').prop('disabled', true);
    axios.post($(e.target).data('url'), {
        'id': $(e.target).data('id')
    })
    .then(function(response) {
        if (response.data.status == 'OK') {
            appMethods.showNotify('success', response.data.message);
            window.location.replace('/usuarios');
        }
        else {
            appMethods.showNotify('danger', response.data.message);
        }
    })
    .catch(function (error) {
        appMethods.showNotify('danger', error);
    })
    .then(function () {
        $('#delRegister button.btn-modalAccept').prop('disabled', false);
        $('#delRegister').modal('hide');
    });
}