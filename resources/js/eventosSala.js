import * as appMethods from './common';

document.addEventListener('DOMContentLoaded', function() {
 
        var calendarEl = document.getElementById('calendarSala');

        var calendarSala = new FullCalendar.Calendar(calendarEl, {
            //plugins: [ interactionPlugin ],
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
                // data: data,
                    
                    success:function(data){
                
                        console.log(data);
                        $("#nombre_usuario").show();
                        $('#id').val(data.id);
                        $('#titulo').val(data.title);
                        let mes= (info.event.start.getMonth()+1);
                        let dia= (info.event.start.getDate());
                        let anho= (info.event.start.getFullYear());
                        $('#user_id').val(data.user_id);
                    // console.log($('#user_id').val()) ;
                    // console.log( $('#auth_user').val());

                        mes=(mes<10)?"0" +mes:mes; //si el mes es menor a 10 entonces concatenas el 0 a ese mes de lo contrario lo deja como está
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
                    
                }); // end ajax call
                
            },
        

            events:"/calendario/getEventosSala/"+$('#nombreSala').val(),

        });

    
        calendarSala.render();

         $('#btnAgregar').on("click",function(){

        //guardarDatosEventos("POST");
        
        let ObjEvento= guardarDatosEventos("POST");

        EnviarInformacion('/createNewEvento',ObjEvento);
        //EnviarInformacion('',ObjEvento);

    });

    $('#btnEliminar').on("click",function(){

        //guardarDatosEventos("POST");
        
        let ObjEvento= guardarDatosEventos("POST");

        //EnviarInformacion('/calendario/eliminar/'+$('#id').val(),ObjEvento);
        EliminarInformacion('/calendario/eliminar',ObjEvento);
        //EnviarInformacion('',ObjEvento);

    });

    $('#btnModificar').on("click",function(){

        //guardarDatosEventos("POST");
        
        let ObjEvento= guardarDatosEventos("POST");

        EnviarInformacion('/calendario/editar',ObjEvento);
        //EnviarInformacion('',ObjEvento);

    });

    function guardarDatosEventos(method){

        let nuevoEvento={
            id:$('#id').val(),
            title:$('#titulo').val(),
            start:$('#fecha').val()+" "+$('#horaInicio').val(),
            end:$('#fecha').val()+" "+$('#horaFin').val(),
            //user_id:$('#user_id').val(),
            sala_id:$('#sala_id').val(),
            descripcion:$('#descripcion').val(),
            

            '_token':$("meta[name='csrf-token']").attr("content"),
            '_method':method
        }

        return nuevoEvento;
        //return (nuevoEvento);
       //console.log(nuevoEvento);
    }
/*
    function EnviarInformacion(accion,objEvento){

        $.ajax({
           type: "POST",
            //url: $(accion.target).closest('form').attr('action'),
           //url: $(accion.target).closest('form').attr('name'),
           //url:"/calendario"+accion,
           url:accion,
           data:objEvento,
           success:function(msg){
               
                console.log(msg);
                $('#exampleModal').modal('toggle');

                calendarSala.refetchEvents(); 
            
           },
           error:function(){alert("hay un error");} 
        });
    }
    */

    function EnviarInformacion(accion,objEvento){

        $.ajax({
           type: "POST",
            //url: $(accion.target).closest('form').attr('action'),
           //url: $(accion.target).closest('form').attr('name'),
           //url:"/calendario"+accion,
           url:accion,
           data:objEvento,
           /*
           success:function(msg){
               
                console.log(msg);
                $('#exampleModal').modal('toggle');

                calendar.refetchEvents(); 
            
           },
           error:function(){alert("hay un error");} 
           */
        })
           .then(function(response) {
            // console.log(response);
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
                console.log('estoy aquí');
                appMethods.showNotify('danger', response.message);
            }
            else {


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

                    //appMethods.showNotify('danger', response.message);
                    
                });
                
                //appMethods.showNotify('danger', response.message);  
                
                    
                   // $('#exampleModal').modal('toggle');
            }

                

            /*
            if(response.validarFecha.length==0){
                $.each($('.invalid-feedback'), function (key, element) {
                    $(element).html('');
                    $(element).hide();
                });
                  
                appMethods.showNotify('danger', response.message);
                $('#exampleModal').modal('toggle');
            }
            */


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

        //$('#id').val("");
        $('#titulo').val("");
        $('#fecha').val("");
        $('#horaInicio').val("");
        $('#horaFin').val("");
        $('#user_id').val("");
       // $('#sala_id').val("");
       
        $('#descripcion').val("");

    }


   // });
});