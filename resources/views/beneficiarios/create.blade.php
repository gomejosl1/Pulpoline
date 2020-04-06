@extends('layouts.app')
@section('styles_additional')

@endsection
@section('script_additional')
<script type="text/javascript">

$("#checkDialisis").prop('required',true);
$("#checkFarmacia").prop('required',true);

    $("#checkDialisis").click(function(){
        if ($(this).is(':checked'))
        {
        $("#checkFarmacia").prop('required',false);
        $('#card_dialisis').show();            
        }else{
        $("#checkFarmacia").prop('required',true);
        $('#card_dialisis').hide();            
        }
    });

    $("#checkFarmacia").click(function(){
        if ($(this).is(':checked'))
        {
        $("#checkDialisis").prop('required',false);            
        $('#card_farmacia').show();            
        }else{
        $("#checkDialisis").prop('required',true);            
        $('#card_farmacia').hide();            
        }
    });

var form = $('#form_beneficiarios');
form.validate( {
 errorElement: "div",
 errorClass: "text-danger",
    errorPlacement: function (error, element) {
        var elm = $(element);

        if (elm.prop('type') == 'checkbox' || elm.prop('type') == 'radio') {
            error.appendTo(elm.closest(':not(input, label, .checkbox, .radio)').first());
        } 
        else
        {
            error.insertAfter(elm);
        }

    },
       messages: {
            check: "Debe seleccionar una casilla"
    },

   });
form.validate().settings.ignore = ":disabled,:hidden";


</script>
@endsection
@section('content')
<div class="container">
                @if (session('status'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="float-right close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                {{ session('status') }}
            </div>
            @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar Beneficiario') }}</div>
                <div class="card-body">
                    <form method="POST" id="form_beneficiarios" action="{{ route('beneficiarios.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cedula" class="col-md-4 col-form-label text-md-right">{{ __('Cedula') }}</label>

                            <div class="col-md-6">
                                <input id="cedula" type="text" class="form-control @error('cedula') is-invalid @enderror" name="cedula" value="{{ old('cedula') }}" required autocomplete="cedula" autofocus>

                                @error('cedula')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>

                            <div class="col-md-6">
                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>

                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                                       
                        <div class="form-group row">
                            <label for="correo" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="correo" type="email" class="form-control @error('email') is-invalid @enderror" name="correo" value="{{ old('correo') }}" required autocomplete="email">

                                @error('correo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                    <div class="form-group row">
                         <label class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Beneficio') }}</label>
                         <div class="col-md-6 row">  
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="checkDialisis" name="check">
                              <label class="custom-control-label" for="checkDialisis">Dialisis </label></div>

                            <div class="custom-control custom-checkbox">                        
                              <input type="checkbox" class="custom-control-input" id="checkFarmacia" name="check">
                              <label class="custom-control-label" for="checkFarmacia">Farmacia</label>
                            </div>
                      </div>
                    </div>
            <!-- card dialisis -->
                    <div class="card" id="card_dialisis" style="margin: 2px;display:none;">    
                        <div class="card-body">            
                            <div class="row justify-content-md-center">
                                <div class="col col-lg-3">
                                    <div class="col-md-12">
                                        <h5>Dialisis</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row" >                        
                                <div class="col-md-2"></div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for="fecha_dialisis" class="col-md-12 col-form-label text-md-left">{{ __('Fecha de dialisis') }}</label>
                                        <input type="text" name="fecha_dialisis" class="form-control floating-label fecha" placeholder="Fecha de dialisis" required>
                                        @error('fecha_dialisis')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label for="hora_dialisis" class="col-md-12 col-form-label text-md-left">{{ __('Hora de dialisis') }}</label>
                                        <input type="text" name="hora_dialisis" class="form-control floating-label hora" placeholder="Fecha de dialisis" required>
                                        @error('hora_dialisis')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label for="id_centro_medico" class="col-md-12 col-form-label text-md-left">{{ __('Centro Médico') }}</label>
                                           <select name="id_centro_medico" id="centro_medico" class="form-control text-uppercase" required>
                                            <option value="" selected disabled hidden>Seleccione...</option>
                                            @foreach ($centros_medicos as $key => $centro_medico)
                                            <option value="{{$centro_medico->id}}">{{$centro_medico->nombre}}</option> 
                                            @endforeach
                                        </select>
                                        @error('id_centro_medico')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div> 
                       <!-- Fin Card Dialisis -->
                   
                   <!-- card Farmacia -->
                   <div class="card" id="card_farmacia" style="margin: 2px;display:none;">    
                    <div class="card-body">            
                        <div class="row justify-content-md-center">
                            <div class="col col-lg-3">
                                <div class="col-md-12">
                                    <h5>Farmacia</h5>
                                </div>
                            </div>
                        </div>
                        <div class="form-row" >                        
                            <div class="col-md-2"></div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="fecha_retiro" class="col-md-12 col-form-label text-md-left">{{ __('Fecha de Retiro') }}</label>
                                    <input type="text" id="fecha_retiro" name="fecha_retiro"class="form-control floating-label fecha" placeholder="Fecha de dialisis" required>
                                    @error('fecha_retiro')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="fecha_dialisis" class="col-md-12 col-form-label text-md-left">{{ __('Farmacia') }}</label>
                                    <select name="id_farmacia" id="id_farmacia" name="id_farmacia" class="form-control text-uppercase" required="required">
                                        <option value="" selected disabled hidden>Seleccione...</option>
                                        @foreach ($farmacias as $key => $farmacia)
                                        <option value="{{$farmacia->id}}">{{$farmacia->nombre}}</option> 
                                        @endforeach
                                    </select>
                                    @error('fecha_dialisis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div> 
                       <!-- Fin Card Farmacia -->
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

