
/*
$(document).ready(function() {


});

*/


let showNotify = function(type, newMessage="") {

    var messageText = "";

    if (newMessage != "") {
        messageText = newMessage;
    }
    else if (type == 'success') {
        messageText = "Acción realizada con éxito";
    }
    else if (type == 'warning') {
        messageText = "Acción completada con errores";
    }
    else if (type == 'danger') {
        messageText = "Error en el proceso: acción no realizada";
    }

    $.notify({
        message: messageText,
    },{
        element: 'body',
        type: type,
        allow_dismiss: true,
        newest_on_top: true,
        showProgressbar: false,
        placement: {
            from: "bottom",
            align: "center"
        },
        offset: 20,
        spacing: 10,
        z_index: 1031,
        delay: 4000,
        timer: 1000
    });
}

export { showNotify };
