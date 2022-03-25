import * as appMethods from './common';

 //var calendar =null //variable global
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendarAllSala');

    var calendarAllSala = new FullCalendar.Calendar(calendarEl, {
        //plugins: [ interactionPlugin ],
        initialView: 'dayGridMonth',
        selectable: true,
        locale: 'es',
    
        headerToolbar: {
            left:'prev next today',
            center:'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        displayEventEnd: {
            
            "default": true
        },

        events:"/calendar/getAllEventosSala/"+$('#nombreSala').val(),

    });

    calendarAllSala.render();

    
   

    
});