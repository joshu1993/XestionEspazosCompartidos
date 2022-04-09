import * as appMethods from './common';

$(function(){
   

    
    let salasUrl = "/saladata/"+$('#idUser').val()+"/";

    salasDatatableAdmin = $('#salasTableAdmin').DataTable({
        stateSave: true,
        dom: 'frtip',
        order: [[ 0, 'asc' ]],
        bLengthChange: false,
        pageLength: 20,
        responsive: true,
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
            searchPlaceholder: "buscar por nombre,aforo,proyector...",
            zeroRecords: "Sin resultados encontrados",
            paginate: {
                first: "Primero",
                last: "Ultimo",
                next: "Siguiente",
                previous: "Anterior"
            }

        },
        ajax: {
            url: salasUrl,
            type: "GET"
        },
        columnDefs: [
            {
                targets: 5,
                className: 'dt-actions'
            }
           
        ],
        columns: [
            { 
                data: "nombre",
                render: setEditSalaButton
            },
            { data: "aforo" },
            { data: "proyector" },
            { 
                data: "color",
                render: setColorButtons 
            },
            { 
                data:"calendar",
                render: setCalendarButton
                
            },
            { 
                data:"actions",
                render: setActionButtons
             
            }

            
        ],
        
        initComplete: function(settings, json) {
            $('a[id^="btnConfirmDelete_"]').on("click",confirmDelete);
        }

        
        
    });

    salasDatatableAdmin.on('search.dt', function(e, settings) {
        var api = new $.fn.dataTable.Api( settings );
        var state = api.state();
        salasDatatableAdmin.state.save();
    });  
    
    salasDatatable = $('#salasTable').DataTable({
        stateSave: true,
        dom: 'frtip',
        order: [[ 0, 'asc' ]],
        bLengthChange: false,
        pageLength: 20,
        responsive: true,
        language: {
            //url: "/js/datatables/es.json",
            decimal: "",
            emptyTable: "No hay niguna sala creada",
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
            url: salasUrl,
            type: "GET"
        },
        columnDefs: [
            {
                
                className: "dt-body-left",
                className: "dt-body-right"
            },
            {
                "targets": [5],
                "visible": false
            }
            
        ],
        columns: [
            { 
                data: "nombre",
                render: setEditSalaButton
            },
           
            { data: "aforo" },
            { data: "proyector" },
            { 
                data: "color",
                render: setColorButtons 
            },
            /*
            { 
                data:"calendar",
                render: setCalendarButton
            },
            */
            { 
                data:"calendar",
                render: setCalendarButton
                //render: setCalendarButton
            },
            { data: "descripcion" }
           
        ],
      
        
    });

    salasDatatable.on('search.dt', function(e, settings) {
        var api = new $.fn.dataTable.Api( settings );
        var state = api.state();
        salasDatatable.state.save();
    });  

    
   // $('#updateSala').on("click",updateSala);
   $('#updateSala').on("click",updateSala);
    if ($('#delRegister').length) {
        $('#delRegister button.btn-modalAccept').on("click",deleteSalaRegister);
    }
   
    $('#new_sala').on('click', function(){
        window.location.replace('createNewSala');
    });

    salasDatatableAdmin.on('click', 'a[id^=btnCalendarSala_]', function(){
        $(this).on("click",confirmDelete);
    }); 

    /*
    
    if( $('#idUser').val()==1){
        salasDatatable.on('click', 'a[id^=btnConfirmDelete_]', function(){
            $(this).on("click",confirmDelete);
        }); 
    }
    */
/*
    
 */
    //$('#calendarSala').on("click",calendarSala);

});


var salasDatatable = null;

var salasDatatableAdmin = null;

function setColorButtons(data, type, row) {
    return '<button href="#" style="background-color:'+ row.color+';color:'+ row.color+';border-color:'+ row.color+';width: 20px; height: 20px; border-radius: 50%;"></button>'
}

function setActionButtons(data, type, row) {
    if( $('#idUser').val()==1){
    return '<a href="#" id="btnConfirmDelete_' + row.DT_RowId + '" data-id="' + row.DT_RowId + '"><i class="material-icons">delete</i></a>';
    }
}

function setEditSalaButton (data, type, row) {
    return '<a href="/sala/' + row.nombre + '" class="action-icons">' + row.nombre + '</a>';
}

function setCalendarButton (data, type, row) {
    return '<a href="/calendario/' + row.nombre + '"  id="btnCalendarSala_' + row.nombre + '"><span class="iconify" data-icon="bi:calendar"></span></a>';
}
 
function confirmDelete(e) {
    e.preventDefault();

   $('#delRegister button.btn-modalAccept').data('id', $(this).data('id'));
   $('#delRegister button.btn-modalAccept').data('url', '/sala/eliminar');
   $('#delRegister').modal('show');
}

function updateSala(e) {

    e.preventDefault();
    let data= new FormData($('#AddSalaForm')[0]);
    //data.append('image', $('#image').val());
    //console.log(data);
   /*
    let data={
        //id:$('#id').val(),
        nombre:$('#nombre').val(),
        descripcion:$('#descripcion').val(),
        metrosCuadrados:$('#metrosCuadrados').val(),
        aforo:$('#aforo').val(),
        proyector:$('#proyector').val(),
        image:$('#image').val(),

       //'_token':$("meta[name='csrf-token']").attr("content")

    };
   */ 
   // let origin = $(e.target).closest('form').attr('name');
    
   //axios({
       
    $.ajax({
        //method: 'post',
        type: "POST",
        //url:$(e.target).closest('form').attr('action'),
        url: $('#AddSalaForm').attr('action'),
        data:data,
        contentType: false,
        processData:false
        
    })
    
   /*
    axios.post($(e.target).closest('form').attr('action'),data, {
        
        headers: {
            'Content-Type': 'multipart/form-data'
          }
    })
    */
    .then(function(response) {
        // console.log(response);
        if (response.error.length == 0) {
            $.each($('.invalid-feedback'), function (key, element) {
                $(element).html('');
                $(element).hide();
            });
            appMethods.showNotify('success', response.message);
           // if(origin === 'createSala'){
                window.location.replace('/salas');                    
           // } else { location.reload(); }                
        }
        else {
            $.each($('.invalid-feedback'), function (key, element) {
                $(element).html('');
                $(element).hide();
            });

            $.each(response.error, function (key, element) {
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

   //console.log($(e.target).closest('form').attr('action')) ;
   //console.log($('#AddSalaForm').attr('action'));
   console.log(data);
}


//imagen
//$('#image').change(function(){
    /*
    $('#image').on('load', function (){
           
        let reader = new FileReader();
    
        reader.onload = (e) => { 
    
          $('#preview-image').attr('src', e.target.result); 
        }
    
        reader.readAsDataURL(this.files[0]); 
      
       });
*/
function deleteSalaRegister(e) {
    $('#delRegister button.btn-modalAccept').prop('disabled', true);
    axios.post($(e.target).data('url'), {
        'id': $(e.target).data('id')
    })
    .then(function(response) {
        if (response.data.status == 'OK') {
            appMethods.showNotify('success', response.data.message);
            window.location.replace('/salas');
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


