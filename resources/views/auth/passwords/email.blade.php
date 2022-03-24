@extends('layouts.loginstile')

@section('content')
<div class="container-login">

    <div class="velo"></div>

    <div class="row-login justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="div-app-name">
                        {{ __('universidadVigo') }} <img src="{{ asset('images/logoUvigo.jpg') }}"  />
                    </div>
                    
                    <form class="form-login" method="POST" action="{{ route('password.email') }}" id='formResetPassword' name='formResetPassword'>
                        @csrf

                        <h5 class="mt-30">Resetear contraseña</h5>

                        <div class="form-group user">
                            <label for="email" class="bmd-label-floating">{{ __('Correo electrónico') }}</label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                     
                        <div class="login-submit">
                                <button type="submit" class="btn btn-primary btn-raised">
                                    {{ __('Recuperar') }}
                                </button>
                        </div>
                        <div class="login-submit">
                                <a class="btn btn-link" href="{{ route('login') }}">
                                    {{ __('volver al login') }}
                                </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
