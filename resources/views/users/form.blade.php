

@extends('layouts.app')

@section('content')
<div id="inner-content" class="container">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="col-md-11">
                    @if(isset($user))
                    <h3>Datos usuario</h3>
                    @else
                    <h3>Nuevo usuario</h3> 
                    @endif
                </div>
                <div class="volver-atras">
                    @if(Auth::user()->role_id == 1)                       
                        <a href="{{ route('users') }}"> ATRÁS </a>              
                    @else
                        <a href="{{ route('calendario') }}"> ATRÁS </a>           
                    @endif
                    
                </div> 
            </div>

            <div class="card-body">
                @if(isset($user))
                <form name="updateUser" action="{{ route('user.update') }}" method="POST">
                @else
                    <form name="createUser" action="{{ route('user.createNewUser') }}" method="POST">
                @endif
                    @csrf
                    <input type="hidden" id="id" name="id" value="{{ $user->id ?? '' }}">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-lg-4">
                            <div class="form-group">
                                <label for="name" class="bmd-label-floating">Nombre Usuario</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name ?? '' }}">
                                <span id="invalid-feedback-name" class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-lg-4">
                            <div class="form-group">
                                <label for="name" class="bmd-label-floating">DNI</label>
                                @if(isset($user))
                                <input type="text" class="form-control" id="dni" name="dni" value="{{ $user->dni ?? '' }}" readonly>
                                @else
                                <input type="text" class="form-control" id="dni" name="dni" value="{{ $user->dni ?? '' }}">
                                @endif
                                <span id="invalid-feedback-dni" class="invalid-feedback"></span>
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-sm-12 col-lg-4">
                            @if(isset($user))
                                @if(\Auth::user()->role_id == 1)
                                <div class="form-group customSelect">
                                    <label for="role" class="bmd-label-floating">Rol</label>
                                    <select class="form-control" id="role" name="role" >
                                        @forelse($roles as $role)
                                            <option value="{{ $role->id ?? '' }}" {{ (($user->role_id == $role->id) ? 'selected' : '') }}>{{ $role->nombreRol }}</option>                                                          @empty
                                            <option value="empty"></option>
                                        @endforelse
                                    </select>
                                </div>
                                @else
                                <div class="form-group">
                                    
                                </div>
                                @endif                        
                            @else
                                <div class="form-group customSelect">
                                    <label for="role" class="bmd-label-floating">Rol</label>
                                    <select class="form-control" id="role" name="role" >
                                        @foreach($roles as $role)
                                        <option value="{{ $role->id ?? '' }}">{{ $role->nombreRol }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-lg-4">
                            <div class="form-group">
                                <label for="email" class="bmd-label-floating">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email ?? '' }}">
                                <span id="invalid-feedback-email" class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-lg-4">
                            <div class="form-group">
                                <label for="password" class="bmd-label-floating">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password">
                                <span id="invalid-feedback-password" class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-lg-4">
                            <div class="form-group">
                                <label for="password_confirmation" class="bmd-label-floating">repetir Contraseña</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                <span id="invalid-feedback-password_confirmation" class="invalid-feedback"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row pull-right mt-20">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            @if(isset($user))
                                @if(Auth::user()->role_id == 1)                       
                                    <a href="{{ route('users') }}" class="btn btn-default">Cancelar</a>
                                    <button id="updateUser" type="button" class="boton-enviar-form">Guardar</button>
                                @else
                                    <button id="updateUser" type="button" class="boton-enviar-form">Guardar</button>
                            
                                @endif
                            @else
                                <a href="{{ route('users') }}" class="btn btn-default">Cancelar</a>
                                <button id="updateUser" type="button" class="boton-enviar-form">Guardar</button>  
                            @endif
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/users.js?v=1.0.0') }}"></script>
@endsection