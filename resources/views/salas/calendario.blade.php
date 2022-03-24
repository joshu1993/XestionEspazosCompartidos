@extends('layouts.app')
@section('content')

    <div class="row-calendar">
        <div class="panel-salas">
            <div class="card-header">
                <div class="row" >
                        
                    <h3>Salas</h3>
                                
                </div>
            </div>
            <div class="card-body">
                <input type="hidden" id="idUser" name="idUser" value="{{ $auth_user['id'] ?? '' }}">  
                <ul class="salas-nombre">
                    <li style="padding-left: 10px;line-height:25px;margin-left: -15px; border: 1px solid rgba(0, 0, 0, 0.12);border-radius: 0.125rem;padding-right: 10px; padding-top: 3px;color:#000!important;background-color:#FFF!important;">
                                
                        <a href="/calendario" class= "sala-nombresala" style="color:#000!important;" >
                            General
                        </a>
                                        
                    </li>

                     @foreach ($salas as $sal) 
                    <li style="padding-left: 10px;line-height:25px;margin-left: -15px; border: 1px solid rgba(0, 0, 0, 0.12);border-radius: 0.125rem;padding-right: 10px; padding-top: 3px;color:#000!important;background-color:{{$sal->color}}!important;">
                                
                        <a href="/calendario/{{ $sal->nombre }}" class= "sala-nombresala" style="color:#000!important;"  value="{{$sal->id}}" >
                            {{ $sal->nombre }}
                        </a>
                                
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>    

    
        <div class="card-calendario">
            
            <div class="card-header">
                <div class="row">    
                    <div class="col-md-11">
                           <h3>Calendario {{ $sala->nombre }}</h3></li>
                       
                    </div>
                </div>    
                
            </div>

            <div class="card-body">
    
                <div id='calendarSala' name='calendarSala'>
                    <input type="hidden" id="nombreSala" name="nombreSala" value="{{ $sala->nombre }}"> 
                </div>
                
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                       
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModal">Agregar Evento</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                            <div class="modal-body">
                            @csrf
                            <input type="hidden" id="id" name="id">
                            <input type="hidden" name="auth_user" id="auth_user" value="{{ $auth_user['id'] ?? '' }}">                        
                            <input type="hidden" name="sala_id" id="sala_id" class="form-control" value="{{ $sala->id}}" readonly>
                                  
                                
                                <div class= "form-row">

                                    <div class="form-group col-md-12">
                                        <label for="titulo" class="bmd-label-floating">Titulo</label>
                                        <input type="text" name="titulo" id="titulo" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="fecha" class="bmd-label-floating">Fecha</label>
                                        <input type="date" name="fecha" id="fecha" class="form-control" readonly>
                                    </div>
                                    
                                    <div class="form-group col-md-4"> 
                                        <label for="horaInicio" class="bmd-label-floating">Hora Inicio</label>
                                        <input type="time" min="08:30" max="23:00" name="horaInicio" id="horaInicio" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4"> 
                                        <label for="horaFin" class="bmd-label-floating">Hora Fin</label>
                                        <input type="time" min="08:30" max="23:00" name="horaFin" id="horaFin" class="form-control">
                                    </div>
                                    <div id="nombre_usuario" class="form-group col-md-8  ">
                                        <label for="user_id" name="user_id" class="bmd-label-floating">Nombre Usuario</label>
                                        

                                        <input type="hidden" name="user_id" id="user_id" class="form-control" >
                                        <input type="text" name="user_name" id="user_name" class="form-control"  readonly>
                                       
                                    </div>
                                   
                                    <div class="form-group col-md-4">
                                        <label for="sala_id" class="bmd-label-floating">Sala</label>
                                       
                                        <input type="text" name="sala_name" id="sala_name" class="form-control" value="{{ $sala->nombre}}" readonly>
                           
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <label for="descripcion" class="bmd-label-floating">Descripcion</label>
                                        <textarea name="descripcion" id="descripcion" class="form-control" cols="20" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                               
                               
                                <button id="btnModificar" class="boton-modificar-evento" >Modificar</button>
                                <button id="btnEliminar" class="boton-eliminar-evento" >Eliminar</button>
                               
                                <button  id="btnAgregar" class="boton-agregar-evento" >Agregar</button>
                                
                                <button type="button" id="btnCancelar" class="boton-cancelar-evento" data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>   
                        </div>

                        
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
      
        $('#app').css("background-position","top center");
        $('#app').css("background-repeat","no repeat");
        $('#app').css("background-attachment","fixed");
        $('#app').css("background-size","cover");
        $('#app').css("background-color","#ffffff");
        
       

       
    </script>
     <script src="{{ asset('js/salas.js?v=1.0.0') }}"></script>
     <script src="{{ asset('js/eventosSala.js?v=1.0.0') }}"></script>
@endsection
