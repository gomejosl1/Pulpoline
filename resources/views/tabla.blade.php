@extends('layouts.app')

<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.20/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.20/datatables.min.js"></script>
 -->
  



<!-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" iqd="theme" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" iqd="theme" rel="stylesheet"> -->

<!-- https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css
https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" iqd="theme" rel="stylesheet"> -->


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script> -->
  
<!--   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/> -->
  
<!-- <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css"> -->
  
<!-- <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script> -->
 <style type="text/css">
      body {
        font: 90%/1.45em "Helvetica Neue", HelveticaNeue, Verdana, Arial, Helvetica, sans-serif;
        margin: 0;
        padding: 0;
        color: #333;
        background-color: #fff;
      }
    </style>
    <script type="text/javascript">
      $(document).ready( function () {
        var table = $('#example').DataTable();
      } );
    </script>
<!-- <script type="text/javascript">
    $('#examplex').DataTable({
     language: {
        "search": "Buscar:",
        "emptyTable": "No hay información",
        "zeroRecords": "Sin resultados encontrados",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered": "(Filtrado de un total de _MAX_ registros)",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
     },
    "pagingType": "simple", // "simple" option for 'Previous' and 'Next' buttons only
   } 
  });
  $('.dataTables_length').addClass('bs-select');
</script> -->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
<!-- ESTA ES LA VENTANA DEL LOGIN -->
            <!-- 
                <div id="alerta_mensaje" class="txtg" align="center" style="top: 20%; left: 450.5px;"><div class="alerta_cerrar txt" align="right">cerrar
                </div>
                <div class="alerta_comentario">

                    <div class="mensaje_titulo">INSTITUTO VENEZOLANO DE SEGUROS SOCIALES</div>
                    <form accept-charset="ISO-8859-1" action="http://autoliquidacionv2.ivss.gob.ve:28082/TiunaWeb/certificadoSolvenciaElectronico.htm" method="post" id="form_solvencia" name="form_solvencia" target="_blank">
                        <div>SISTEMA DE MENSAJERIA</div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                </div> -->
           <!-- ESTA ES LA VENTANA DEL LOGIN -->
      <div class="form-group ">
        <table id="example" class="table display table-striped table-bordered" style="width:100%">
            <thead>
                <h3>Usuarios Registrados</h3>
                <div class="row">                    
                <div class="" style="margin-left: 20px"></div><label class=" label">Buscar</label>
                <input type="search" name="buscar" id="buscar" class="form-control col-md-4">
                <br>
                <br>
                </div>
                <tr>
                    <th>Usuario</th>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Tipo de Usuario</th>
                </tr>
            </thead>

        <tbody>
            <tr>
                <td>gomejos1</td>
                <td>V22780099</td>
                <td>Jose Luis</td>
                <td>Gómez Lugo</td>
                <td>Administrador</td>
            </tr>
            <tr>
                <td>kvillegas</td>
                <td>v23434213</td>
                <td>Kelvin Alexander</td>
                <td>Martinez Gonzalez</td>
                <td>Paciente</td>
            </tr>
        </tbody>

    </table>
</div>
            </div>
        </div>
    </div>
</div>
@endsection


<div class="form-group row">
    <label for="email" class="col-md-5 col-form-label text-md-right">Usuario</label>
    <div class="col-md-6">
        <input id="usuario" type="email" class="form-control " name="usuario" value="gomejosl1"  autofocus>
    </div>
</div>