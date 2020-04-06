    <script src="https://code.jquery.com/jquery-3.3.1.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" ></script>

 <!--    <script src="{{ asset('plugins/bootstrap/js/popper.min.js') }}" ></script>    
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}" ></script>    -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" defer></script>
    <script src="{{ asset('plugins/jquery.steps-1.1.0/jquery.steps.min.js') }}" defer></script>
    <script src="{{ asset('plugins/jquery.steps-1.1.0/jquery.steps.js') }}" defer></script> 
<!--    
    <script src="{{ asset('plugins/moment/moment.js') }}" ></script>    
    <script src="{{ asset('plugins/moment/moment-with-locales.min.js') }}" ></script>    
    <script src="{{ asset('plugins/bootstrap-datetimepicker-master/build/js/bootstrap-datetimepicker.min.js') }}" ></script>    
    <script src="{{ asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}" ></script>    
-->

     <!-- <script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script> -->
        <!-- <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/ripples.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/material.min.js"></script>
        <script type="text/javascript" src="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/js/material.min.js"></script> -->
        <script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
        <script type="text/javascript" src="{{ asset('plugins/bootstrap-material-datetimepicker-gh-pages/js/bootstrap-material-datetimepicker.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/jquery.steps-1.1.0/jquery.validate.min.js') }}"></script>
            <script type="text/javascript">
                
/*
 * Translated default messages for the jQuery validation plugin.
 * Locale: ES (Spanish; Español)
 */
$.extend( $.validator.messages, {
    required: "Este campo es obligatorio.",
    remote: "Por favor, rellena este campo.",
    email: "Por favor, escribe una dirección de correo válida.",
    url: "Por favor, escribe una URL válida.",
    date: "Por favor, escribe una fecha válida.",
    dateISO: "Por favor, escribe una fecha (ISO) válida.",
    number: "Por favor, escribe un número válido.",
    digits: "Por favor, escribe sólo dígitos.",
    creditcard: "Por favor, escribe un número de tarjeta válido.",
    equalTo: "Por favor, escribe el mismo valor de nuevo.",
    extension: "Por favor, escribe un valor con una extensión aceptada.",
    maxlength: $.validator.format( "Por favor, no escribas más de {0} caracteres." ),
    minlength: $.validator.format( "Por favor, no escribas menos de {0} caracteres." ),
    rangelength: $.validator.format( "Por favor, escribe un valor entre {0} y {1} caracteres." ),
    range: $.validator.format( "Por favor, escribe un valor entre {0} y {1}." ),
    max: $.validator.format( "Por favor, escribe un valor menor o igual a {0}." ),
    min: $.validator.format( "Por favor, escribe un valor mayor o igual a {0}." ),
    nifES: "Por favor, escribe un NIF válido.",
    nieES: "Por favor, escribe un NIE válido.",
    cifES: "Por favor, escribe un CIF válido."
} );
<!--  -->



            $('#date').bootstrapMaterialDatePicker
            ({
                time: false,
                clearButton: true

            });
// clase para hora con tiempo en am/pm
            $('.hora').bootstrapMaterialDatePicker
            ({
                date: false,
                shortTime: true,
                format: 'hh:mm a'
            });

            $('#date-format').bootstrapMaterialDatePicker
            ({
                format: 'dddd DD MMMM YYYY - HH:mm'
            });
            // Clase para datepicker con fechas en español
            $('.fecha').bootstrapMaterialDatePicker 
            ({
                format: 'DD/MM/YYYY',
                lang: 'es',
                weekStart: 1, 
                time: false,
                cancelText : 'Cancelar',
                nowText : 'actual',
                nowButton : true,
                switchOnClick : true
            });

            $('#date-end').bootstrapMaterialDatePicker
            ({
                weekStart: 0, format: 'DD/MM/YYYY HH:mm'
            });
            $('#date-start').bootstrapMaterialDatePicker
            ({
                weekStart: 0, format: 'DD/MM/YYYY HH:mm', shortTime : true
            }).on('change', function(e, date)
            {
                $('#date-end').bootstrapMaterialDatePicker('setMinDate', date);
            });

            $('#min-date').bootstrapMaterialDatePicker({ format : 'DD/MM/YYYY HH:mm', minDate : new Date() });

            // $.material.init()
        
                function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  $('#main').hide();
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  $('#main').show();
}
</script>
    @yield('script_additional')