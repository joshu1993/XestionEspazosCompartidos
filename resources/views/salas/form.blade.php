@extends('layouts.app')

@section('content')
<div id="inner-content" class="container">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="col-md-11">
                    @if(isset($sala))                        
                    <h3> Datos {{ $sala->nombre }}</h3>
                    @else
                    <h3>Nueva Sala</h3>
                    @endif  
                </div> 
                <div class="volver-atras">
                    <a href="{{ route('salas') }}"> ATRÁS </a>
                </div >         
            </div>
            <div class="card-body">
                @if(isset($sala))
                <form name="updateSala" id="AddSalaForm" action="{{ route('updateSala') }}" method="POST" enctype="multipart/form-data" id="image-upload-preview">
            
                @else
                <form name="createSala" id="AddSalaForm" action="{{ route('sala.createNewSala') }}" method="POST" enctype="multipart/form-data" id="image-upload-preview">
                @endif
                    @csrf 
                    <!--<input type="hidden" id="nombre" name="nombre" value="{{ $sala->nombre ?? '' }}">-->
                    <input type="hidden" id="id" name="id" value="{{ $sala->id ?? '' }}">
                    <input type="hidden" id="idUser" name="idUser" value="{{ $auth_user['id'] ?? '' }}">
                    <input type="hidden" id="user_role" name="user_role" value="{{ $auth_user['role_id'] ?? '' }}">
                    
                    <div class="row">
                    
                        <div class="col-md-6 col-sm-12 col-lg-12" style="display:inline">
                            <div class="col-md-6 col-sm-12 col-lg-5" style="float:left" >
                                <div class="row">
                                    
                                    <div class="col-md-6 col-sm-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="nombre" class="bmd-label-floating">Nombre Sala</label>
                                            @if(isset($sala))
                                            
                                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $sala->nombre ?? '' }}" @if($auth_user['role_id']!=1) readonly @endif>
                                            @else
                                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $sala->nombre ?? '' }}" @if($auth_user['role_id']!=1) readonly @endif>
                                            @endif

                                            <span id="invalid-feedback-nombre" class="invalid-feedback"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-lg-12">
                                        @if(isset($sala))
                                           
                                                @if(\Auth::user()->role_id == 1)
                                                    <div class="form-group">
                                                        <label for="descripcion" class="bmd-label-floating">Disponibilidad</label>
                                                        <select name="sala_rol[]" id="sala_rol" class="form-control multiselect_box" title="no hay nada seleccionado" style="text-transform: uppercase;" multiple data-select-text-format="count > 3">
                                                        
                                                            @foreach($roles as $rol )
                                                                   
                                                                    <option name="sala_rol[]"  value= "{{ $rol->id ?? '' }}" @foreach ($sala->salaRoles as $salaRoles) {{(($salaRoles->pivot->role_id== $rol->id) ? 'selected' : '')}} @endforeach>{{ $rol->nombreRol }}</option>                                                   
                                                                
                                                            @endforeach
                                                        
                                                        </select>
                                                            
                                                    </div>
                                                @else
                                                    <div class="form-group">
                                        
                                                    </div>       
                                                    
                                                @endif
                                            
                                        @else
                                            <div class="form-group">
                                                <label for="descripcion" class="bmd-label-floating">Disponibilidad</label>
                                                <select name="sala_rol[]" id="sala_rol" class="form-control multiselect_box" title="no hay nada seleccionado" style="text-transform: uppercase;" multiple data-select-text-format="count > 3">
                                                    
                                                    @forelse($roles as $rol)
                                                    
                                                        <option name="sala_rol"  value="{{ $rol->id ??''}}" >{{ $rol->nombreRol }}</option> @empty                                                     
                                                
                                                    @endforelse
                                            
                                                </select>
                                            </div>
                                        @endif

                                        
                                    </div>
                                </div>
                    
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="descripcion" class="bmd-label-floating">Descripcion</label>
                                            <textarea name="descripcion" rows="3" cols="10" class="form-control" id="descripcion" name="descripcion" value="" @if($auth_user['role_id']!=1) readonly @endif>{{ $sala->descripcion ?? '' }}</textarea>
                                            <span id="invalid-feedback-descripcion" class="invalid-feedback"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-lg-12" style="display:inline">
                                        <div class="col-md-6 col-sm-12 col-lg-5" style="float:left" >
                                            <div class="form-group">
                                                <label for="metrosCuadrados" class="bmd-label-floating">Metros Cuadrados</label>
                                                <input type="number" class="form-control" id="metrosCuadrados" name="metrosCuadrados" min="1" value="{{ $sala->metrosCuadrados ?? '' }}" @if($auth_user['role_id']!=1) readonly @endif>
                                                <span id="invalid-feedback-metrosCuadrados" class="invalid-feedback"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-lg-4" style="float:right" >
                                            <div class="form-group">
                                                <label for="aforo" class="bmd-label-floating">Aforo</label>
                                                <input type="number" class="form-control" id="aforo" name="aforo" min="1" value="{{ $sala->aforo ?? '' }}" @if($auth_user['role_id']!=1) readonly @endif>
                                                <span id="invalid-feedback-aforo" class="invalid-feedback"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-md-6 col-sm-12 col-lg-12" style="display:inline">
                                        <div class="col-md-6 col-sm-12 col-lg-5" style="float:left" >
                                        <div class="form-group">
                                            <label for="proyector" class="bmd-label-floating">Proyector</label>
                                            <input type="text" class="form-control" id="proyector" name="proyector" value="{{ $sala->proyector ?? '' }}" @if($auth_user['role_id']!=1) readonly @endif>
                                            <span id="invalid-feedback-proyector" class="invalid-feedback"></span>
                                        </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-lg-4" style="float:right" >
                                            <div class="form-group">
                                                <label for="color" class="bmd-label-floating">Color Sala</label>
                                                <input type="color" class="form-control" id="color" name="color" min="1" value="{{ $sala->color ?? '' }}" @if($auth_user['role_id']!=1) readonly @endif>
                                                <span id="invalid-feedback-aforo" class="invalid-feedback"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-6 col-sm-12 col-lg-6" style="float:right" >   
                                
                                @if(isset($sala))
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-lg-12">
                                        <div class="imagen-sala">
                                            <h4><b> Imagenes Sala </b></h4>
                                        </div>
                                    
                                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner" style="width:500px; height:500px; margin-left:15px; object-fit: cover;object-position: center center;">
                                                @forelse ($imagenes as $image)

                                                <div class="carousel-item @if($loop->index==0) active @endif"> 
                                                <!-- <input type="hidden" id="image" name="image" value="{{ $sala->image ?? '' }}">-->
                                                    <img id="img" class="d-block w-90" width="90%" src="../../images/salas/{{ $image->image ?? '' }}"  >
                                                </div>
                                                @empty
                                                @endforelse
                                            
                                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>

                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!--<input id="image"  name="image" type="file">-->
                                </div>
                                @endif
                                @if($auth_user->role_id == 1) 
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 col-lg-12">
                                        <div class="imagen-sala">
                                            <h4><b>Subir imágenes</b></h4>
                                    
                                            <input type="file" name="images[]" multiple>
                                            
                                        </div>

                                    </div>
                                </div>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                    <div class="row pull-right mt-20">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            @if(isset($sala))
                                @if($auth_user->role_id == 1)                        
                                <a href="{{ route('salas') }}" class="btn btn-default">Atrás</a>
                                <button id="updateSala" type="button" class="boton-enviar-form">Guardar</button>
                                @else
                                <a href="{{ route('salas') }}" class="btn btn-default">Atrás</a>
                                @endif
                            @else
                                <a href="{{ route('salas') }}" class="btn btn-default">Atrás</a>
                                @if($auth_user->role_id != 3)
                                <button id="updateSala" type="button" class="boton-enviar-form ">Guardar</button>
                                @endif
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
    <script src="{{ asset('js/salas.js?v=1.0.0') }}"></script>
    
   
    <script type="text/javascript">
         $(document).ready(function(){
            $('.multiselect_box').selectpicker();
        });
        
    </script>

@endsection