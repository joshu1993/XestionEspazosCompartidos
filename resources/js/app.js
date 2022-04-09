require('./bootstrap');
require( 'bootstrap-material-design' );
require( 'datatables.net-bs4' );
require( 'datatables.net-buttons-bs4' );
require( 'datatables.net-buttons/js/buttons.colVis.js' );
require( 'datatables.net-buttons/js/buttons.flash.js' );
require( 'datatables.net-buttons/js/buttons.html5.js' );
require( 'datatables.net-buttons/js/buttons.print.js' );
require( 'datatables.net-responsive-bs4' );
require('bootstrap-notify');


$(function() { 
	$('body').bootstrapMaterialDesign();
    $('body').addClass('hidemenu');
    $('#menu-show').on('click', function() {
        var $body = $('body');
        if ($body.hasClass('showmenu')) {
            $body.removeClass('showmenu');
            $body.addClass('hidemenu');
        } else {
            $body.addClass('showmenu');
            $body.removeClass('hidemenu');
        }
    });	 
});