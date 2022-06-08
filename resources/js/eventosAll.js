import * as appMethods from './common';

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendarAll');

    var calendarAll = new FullCalendar.Calendar(calendarEl, {
        
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

        events:"/calendar/getAllEventos",

    });

    calendarAll.render();
   
});

