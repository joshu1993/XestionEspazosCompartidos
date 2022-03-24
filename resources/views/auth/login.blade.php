@extends('layouts.loginstile')

@section('content')

<div class="container-login">

    <div class="velo"></div>
    
    <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    

                    <div class="card-body">

                        <div class="div-app-name">
                            <img  src="{{ asset('images/logoUvigo.jpg') }}"  />
                        </div>

                        
                        <form  class="form-login" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group user">
                                <label for="email" class="bmd-label-floating">{{ __('E-Mail ') }}</label>
                                <input type="text" class="form-control" id="email" name="email" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                            </div>

                            <div class="form-group pass">
                                <label for="password" class="bmd-label-floating">{{ __('Contraseña') }}</label>

                                
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                            </div>
                            <!--
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('recuerdame') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
-->
                            <div class="login-submit">
                               
                                    <button type="submit" class="btn btn-primary-iniciar-sesion btn-raised">
                                        {{ __('Iniciar sesión') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Olvidaste tu contraseña?') }}
                                        </a>
                                     @endif

            
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        
    </div>
</div>
@endsection
