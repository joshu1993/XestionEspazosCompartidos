import * as appMethods from './common';

document.addEventListener('DOMContentLoaded', function() {
 
        var calendarEl = document.getElementById('calendarSala');

        var calendarSala = new FullCalendar.Calendar(calendarEl, {

            initialView: 'dayGridMonth',
            selectable: true,
            locale: 'es',
            weekends: false,//fin de semana ocultos
        
            customButtons: {
                myCustomButton: {
                    
                    click: function() {
                        $('#exampleModal').modal();
                    }
                }

            },

            headerToolbar: {
                left:'prev next today',
                center:'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            displayEventEnd: {
            
                "default": true
            },

            dateClick:function(info){

                limpiarFormulario();

                $('#fecha').val(info.dateStr);
                $('#fecha').prop('readonly', true);
                $("#nombre_usuario").hide();
                $('#sala_name').val();
                $('#sala_name').prop('readonly', true);
                $('#btnAgregar').show();
                $('#btnModificar').hide();
                $('#btnEliminar').hide();
                
                $('#exampleModal').modal();
            
            },

            eventClick: function (info) {

                $.ajax({
                    url: '/calendario/showEvento/'+info.event.id,
                    type: "GET",
                    dataType: 'json',
                    
                    success:function(data){
                
                        console.log(data);
                        $("#nombre_usuario").show();
                        $('#id').val(data.id);
                        $('#titulo').val(data.title);
                        let mes= (info.event.start.getMonth()+1);
                        let dia= (info.event.start.getDate());
                        let anho= (info.event.start.getFullYear());
                        $('#user_id').val(data.user_id);
                   
                        mes=(mes<10)?"0" +mes:mes; //si el mes es menor a 10 entonces concatenas el 0 a ese mes de lo contrario lo deja como est??
                        dia=(dia<10)?"0" +dia:dia;

                        let horaInicial=info.event.start.getHours();
                        let minutosInicial=info.event.start.getMinutes();

                        horaInicial=(horaInicial<10)?"0" +horaInicial:horaInicial;
                        minutosInicial=(minutosInicial<10)?"0" +minutosInicial:minutosInicial;

                        let horaFinal=info.event.end.getHours();
                        let minutosFinal=info.event.end.getMinutes();

                        horaFinal=(horaFinal<10)?"0" +horaFinal:horaFinal;
                        minutosFinal=(minutosFinal<10)?"0" +minutosFinal:minutosFinal;

                        let horarioInicio=(horaInicial+":"+minutosInicial);
                        let horarioFin=(horaFinal+":"+minutosFinal);

                        $('#fecha').val(anho+"-"+mes+"-"+dia);
                    
                        $('#horaInicio').val(horarioInicio);
                        $('#horaFin').val(horarioFin);
                            
                        $('#user_name').val(data.nombreUser);     
                        $('#sala_id').val(data.sala_id);
                            
                        $('#descripcion').val(data.descripcion);

                        $('#btnAgregar').hide();

                        if( $('#user_id').val() ==   $('#auth_user').val()){
                            $('#titulo').prop('readonly', false);
                            $('#fecha').prop('readonly', false);
                            $('#horaInicio').prop('readonly', false);
                            $('#horaFin').prop('readonly', false);
                            $('#user_name').prop('readonly', true);
                            $('#sala_name').prop('readonly', true);
                            $('#descripcion').prop('readonly',false);
                            $('#btnModificar').show();
                            $('#btnEliminar').show();
                        }
                        else{
                            $('#titulo').prop('readonly', true);
                            $('#horaInicio').prop('readonly', true);
                            $('#horaFin').prop('readonly', true);
                            $('#user_name').prop('readonly', true);
                            $('#sala_name').prop('readonly', true);
                            $('#descripcion').prop('readonly', true);
                            $('#btnModificar').hide();
                            $('#btnEliminar').hide();
                        }
              
                        $('#exampleModal').modal();
                    
                    }    
                    
                }); 
                
            },
        
            events:"/calendario/getEventosSala/"+$('#nombreSala').val(),

        });

        calendarSala.render();

         $('#btnAgregar').on("click",function(){

        let ObjEvento= guardarDatosEventos("POST");

        EnviarInformacion('/createNewEvento',ObjEvento);

    });

    $('#btnEliminar').on("click",function(){

        let ObjEvento= guardarDatosEventos("POST");

        EliminarInformacion('/calendario/eliminar',ObjEvento);

    });

    $('#btnModificar').on("click",function(){

        let ObjEvento= guardarDatosEventos("POST");

        EnviarInformacion('/calendario/editar',ObjEvento);
    });

    function guardarDatosEventos(method){

        let nuevoEvento={
            id:$('#id').val(),
            title:$('#titulo').val(),
            start:$('#fecha').val()+" "+$('#horaInicio').val(),
            end:$('#fecha').val()+" "+$('#horaFin').val(),
            sala_id:$('#sala_id').val(),
            descripcion:$('#descripcion').val(),
            
            '_token':$("meta[name='csrf-token']").attr("content"),
            '_method':method
        }

        return nuevoEvento;
        
    }

    function EnviarInformacion(accion,objEvento){

        $.ajax({
           type: "POST",
           url:accion,
           data:objEvento,
          
        })
           .then(function(response) {
           
            if (response.error.length == 0) {
                $.each($('.invalid-feedback'), function (key, element) {
                    $(element).html('');
                    $(element).hide();
                });
              
                    appMethods.showNotify('success', response.message);

                    $('#exampleModal').modal('toggle');
    
                    calendarSala.refetchEvents();           
            }
            else if(response.error.length==1){
                appMethods.showNotify('danger', response.message);
            }else if(response.error.length==2){
                console.log('estoy aqu??');
                appMethods.showNotify('danger', response.message);
            }
            else {

                $.each(response.error, function (key, element) {
                    for(var i = 0; i < element.length; i++) {
                        if ((element[i].toUpperCase().indexOf('CONFIRMACI??N') != -1) || (element[i].toUpperCase().indexOf('CONFIRMACION') != -1)) {
                            $(('#invalid-feedback-' + key + '_confirmation')).html(element[i]);
                            $(('#invalid-feedback-' + key + '_confirmation')).show();
                             element.splice(i, 1);
                        }
                            break; 
                    }
        
                    $(('#invalid-feedback-' + key)).html(element.join('<br>'));
                    $(('#invalid-feedback-' + key)).show();
 
                });
              
            }

        })
        .catch(function (error) {
            appMethods.showNotify('danger', error);
        });   
    }

    function EliminarInformacion(accion,objEvento){
       
        $.ajax({
           type: "POST",
           url:accion,
           data:objEvento,
           
        })
        .then(function(response) {
            if (response.status == 'OK') {

                appMethods.showNotify('success', response.message);
                $('#exampleModal').modal('toggle');

                calendarSala.refetchEvents(); 
            }
            else {
                appMethods.showNotify('danger', response.message);
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

    function limpiarFormulario(){

        $('#titulo').val("");
        $('#fecha').val("");
        $('#horaInicio').val("");
        $('#horaFin').val("");
        $('#user_id').val("");
        $('#descripcion').val("");

    }

});