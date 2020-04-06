@extends('layouts.app')
@section('styles_additional')

@endsection
@section('script_additional')

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
                <div class="card-header">{{ __('Modificar Mensaje de Dialisis') }}</div>
                <div class="card-body">
                                {{ Form::open(['route' => ['cuerpo_mensajes_update', encrypt($cuerpo_mensajes->id)], 'method' => 'PUT']) }}
                        @csrf

                        <div class="form-group row">
                            <input type="hidden" id="form" name="form" value="{{$form}}">
                            <label for="parteuno" class="col-md-4 col-form-label text-md-right">{{ __('Parte Uno') }}</label>

                            <div class="col-md-6">
                                <input id="parteuno" type="text" class="form-control @error('parteuno') is-invalid @enderror" name="parteuno" value="{{ old('parteuno',$cuerpo_mensajes->parteuno) }}" required autocomplete="parteuno" autofocus>

                                @error('parteuno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="partedos" class="col-md-4 col-form-label text-md-right">{{ __('Parte Dos') }}</label>

                            <div class="col-md-6">
                                <input id="partedos" type="text" class="form-control @error('partedos') is-invalid @enderror" name="partedos" value="{{ old('partedos',$cuerpo_mensajes->partedos) }}" required autocomplete="partedos" autofocus>

                                @error('partedos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="partetres" class="col-md-4 col-form-label text-md-right">{{ __('Parte Tres') }}</label>

                            <div class="col-md-6">
                                <input id="partetres" type="text" class="form-control @error('partetres') is-invalid @enderror" name="partetres" value="{{ old('partetres',$cuerpo_mensajes->partetres) }}" required autocomplete="partetres" autofocus>

                                @error('partetres')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="partecuatro" class="col-md-4 col-form-label text-md-right">{{ __('Parte Cuatro') }}</label>

                            <div class="col-md-6">
                                <input id="partecuatro" type="text" class="form-control @error('partecuatro') is-invalid @enderror" name="partecuatro" value="{{ old('partecuatro',$cuerpo_mensajes->partecuatro) }}" required autocomplete="partecuatro" autofocus>

                                @error('partecuatro')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                {{ Form::close() }}                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

