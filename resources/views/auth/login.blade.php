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

                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                                
                            </div>

                            <div class="form-group pass">
                                <label for="password" class="bmd-label-floating">{{ __('Contraseña') }}</label>

                                
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                
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
                        @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>    
                                    <strong>{{ $message }}</strong>
                                </div>
                        @endif
                    </div>
                </div>
            </div>
        
    </div>
</div>
@endsection
@section('scripts')
     <script src="{{ asset('js/common.js?v=1.0.0') }}"></script>
@endsection
