import * as appMethods from './common';

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendarAllSala');

    var calendarAllSala = new FullCalendar.Calendar(calendarEl, {
       
        initialView: 'dayGridMonth',
        selectable: true,
        locale: 'es',
        weekends: false,
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