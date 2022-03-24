//import * as appMethods from './common';

$(function(){
   
    let eventosUrl = "/eventosdata/"+$('#idUser').val()+"/";

    eventosDatatableAdmin = $('#eventosTableAdmin').DataTable({
        stateSave: true,
        dom: 'frtip',
        order: [[ 0, 'asc' ], [ 1, 'asc' ]],
        bLengthChange: false,
        pageLength: 20,
        language: {
            //url: "/js/datatables/es.json",
            decimal: "",
            emptyTable: "No hay niguna reserva de sala para hoy",
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
            url: eventosUrl,
            type: "GET"
        },
        /*
        columnDefs: [
            {
                targets: 5,
                className: 'dt-actions-center'
            }
           
        ],
        */
        columns: [
            
            { data: "start"},
            { data: "end" },
            { data: "userName"},
            { data: "userDni"},
            { data: "userEmail" },
            { data: "salaNombre"},
           
        ]
        
     
    });


    eventosDatatable = $('#eventosTable').DataTable({
        stateSave: true,
        dom: 'frtip',
        order: [[ 0, 'asc' ], [ 1, 'asc' ]],
        bLengthChange: false,
        pageLength: 20,
        language: {
            //url: "/js/datatables/es.json",
            decimal: "",
            emptyTable: "No hay niguna reserva de sala",
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
            url: eventosUrl,
            type: "GET"
        },
        /*
        columnDefs: [
            {
                targets: 5,
                className: 'dt-actions-center'
            }
           
        ],
        */
        columns: [
            
            { data: "start"},
            { data: "end" },
            { data: "salaNombre"},
           
        ]
        
     
    });
    /*
    eventosDatatable.on('search.dt', function(e, settings) {
        var api = new $.fn.dataTable.Api( settings );
        var state = api.state();
        eventosDatatable.state.save();
    }); 
    */

});

var eventosDatatable = null;
var eventosDatatableAdmin = null;

