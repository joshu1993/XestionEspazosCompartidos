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

                    <form class="form-login" method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <div class="form-group user">
                            <label for="email" class="bmd-label-floating">{{ __('Correo electrónico') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group user">
                            <label for="password" class="bmd-label-floating">{{ __('Contraseña') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group user">
                            <label for="password-confirm" class="bmd-label-floating">{{ __('Confirmar Contraseña') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>                                                

                        <div class="login-submit">
                                <button type="submit" class="btn btn-primary btn-raised">
                                    {{ __('Resetear') }}
                                </button>
                        </div>
                        <div class="login-submit">
                                <a class="btn btn-link" href="{{ route('login') }}">
                                    {{ __('Login') }}
                                </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
                       
@endsection
