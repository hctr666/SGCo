
$(function() {

    $.datepicker.regional['es'] = {
        renderer: $.ui.datepicker.defaultRenderer,
        monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
        'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
        'Jul','Ago','Sep','Oct','Nov','Dic'],
        dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
        dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        prevText: '&#x3c;Ant', 
        prevStatus: '',
        prevJumpText: '&#x3c;&#x3c;', 
        prevJumpStatus: '',
        nextText: 'Sig&#x3e;', 
        nextStatus: '',
        nextJumpText: '&#x3e;&#x3e;', 
        nextJumpStatus: '',
        currentText: 'Hoy', 
        currentStatus: '',
        todayText: 'Hoy', 
        todayStatus: '',
        clearText: '-', 
        clearStatus: '',
        closeText: 'Cerrar', 
        closeStatus: '',
        yearStatus: '', 
        monthStatus: '',
        weekText: 'Sm', 
        weekStatus: '',
        dayStatus: 'DD d MM',
        defaultStatus: '',
        showOn: 'both',
        buttonImage: 'img/calendar.png',
        buttonImageOnly: true,
        isRTL: false,
        showAnim:'drop',
        changeYear:'true'
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);

    $( "#fechaInicio" ).datepicker({
        //maxDate:'0',
        changeMonth: true,
        changeYear: true //,

        /*onClose: function (selectedDate) {
            $("#fechaFin").datepicker("option", "minDate", selectedDate);
        }*/
    });
    $('#fechaFin').datepicker({
        //        maxDate:'0',
        changeMonth: true,
        changeYear: true //,

        /*onClose: function (selectedDate) {
            $("#fechaInicio").datepicker("option", "maxDate", selectedDate);
        }*/
    });

});
