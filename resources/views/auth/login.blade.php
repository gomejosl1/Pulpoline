@extends('layouts.app')

@section('script_additional')
<script type="text/javascript">
    $("#modal-btn-si").on("click", function() {
        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }
        var emailGuest = ($("#emailGuest").val());
        if (isEmail(emailGuest)) {
            $("#guestForm").submit();
        } else {
            $("#error").show();
            $("#errorMessage").html("Por favor ingrese un correo válido");
        }
        // $("#mi-modal").modal('hide');
    });

    $("#modal-btn-no").on("click", function() {
        $("#mi-modal").modal('hide');
    });
</script>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(Session::has('success'))

                <div class="alert alert-success" id="alert">
                    <strong>Success:</strong> {{Session::get('success')}}
                </div>

                @elseif(session('error'))
                <div class="alert alert-danger" id="alert">

                    <strong>Error:</strong>{{Session::get('error')}}
                </div>
                @endif
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

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

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <div>

                        <button type="button" class="btn">
                            <a data-toggle="modal" data-target="#mi-modal" data-link="{{ route('guest') }}" title="Usuario Invitado" class="float-right   m-r-5">
                                {{ __('guest user?') }}
                            </a>
                        </button>
                    </div>
                    <!-- Creo modal para tomar el correo del usuario invitado -->
                    <div class="modal fade" tabindex="-1" role="dialog" id="mi-modal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Por favor ingrese un correo electrónico</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="emailGuest" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <form method="POST" id='guestForm' action="{{ route('guest') }}">
                                                @csrf
                                                {{ method_field('POST') }}
                                                <input id="emailGuest" type="emailGuest" class="form-control @error('email') is-invalid @enderror" name="emailGuest" value="{{ old('emailGuest') }}" required autocomplete="emailGuest" autofocus>

                                                <span class="invalid-feedback" id='error' role="alert">
                                                    <strong id='errorMessage'></strong>
                                                </span>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="modal-btn-no" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" id="modal-btn-si" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection