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
                <div class="card-header">{{ __('Modificar Farmacias') }}</div>
                <div class="card-body">
                                {{ Form::open(['route' => ['farmacias.update', encrypt($farmacias->id)], 'method' => 'PUT']) }}
                        @csrf

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre',$farmacias->nombre) }}" required autocomplete="nombre" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Direccion') }}</label>

                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion',$farmacias->direccion) }}" required autocomplete="direccion" autofocus>

                                @error('direccion')
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

