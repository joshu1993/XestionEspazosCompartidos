@extends('layouts.app')
@section('content')

        <div class="row-calendar">
            <div class="panel-salas">
                <div class="card-header">
                    <div class="row" >
                        
                        <h3>Salas</h3>
                                
                    </div>
                </div>
                <div class="card-body-salas">
                <input type="hidden" id="idUser" name="idUser" value="{{ $auth_user['id'] ?? '' }}">  
                    <ul class="salas-nombre">
                        <li style="padding-left: 10px;line-height:25px;margin-left: -15px; border: 1px solid rgba(0, 0, 0, 0.12);border-radius: 0.125rem;padding-right: 10px; padding-top: 3px;color:#000!important;background-color:#FFF!important;">
                                
                            <a href="/calendario" class= "sala-nombresala" style="color:#000!important;" >
                                General
                            </a>
                                                
                        </li>
                        @foreach ($salas as $sala) 
                        <li style="padding-left: 10px;line-height:25px;margin-left: -15px; border: 1px solid rgba(0, 0, 0, 0.12);border-radius: 0.125rem;padding-right: 10px; padding-top: 3px;color:#000!important;background-color:{{$sala->color}}!important;">
                                
                            <a href="/calendario/{{ $sala->nombre }}" class= "sala-nombresala" style="color:#000!important;"  value="{{$sala->id}}" >
                                {{ $sala->nombre }}
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
                            <h3>Calendario</h3>
                        </div>
                            
                    </div>
                </div>

                <div class="card-body">
        
                    <div id='calendar'></div>
                    <!--Modal add-->
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
                                
                                    <div class= "form-row">

                                        <div class="form-group col-md-12 titulo">
                                            <label for="titulo" class="bmd-label-floating titulo">Titulo</label>
                                            <input type="text" name="titulo" id="titulo" class="form-control" >
                                            <span id="invalid-feedback-title" class="invalid-feedback"></span>
                                        </div>
                                        <div class="form-group col-md-4 fecha">
                                            <label for="fecha" class="bmd-label-floating fecha">Fecha</label>
                                            <input type="date" name="fecha" id="fecha" class="form-control" readonly>
                                        </div>
                                        
                                        <div class="form-group col-md-4 "> 
                                            <label for="horaInicio" class="bmd-label-floating">Hora Inicio</label>
                                            <select class="form-control" name="horaInicio" id="horaInicio">
                                                <option value="08:30">08:30 h.</option>
                                                <option value="09:00">09:00 h.</option>
                                                <option value="09:30">09:30 h.</option>
                                                <option value="10:00">10:00 h.</option>
                                                <option value="10:30">10:30 h.</option>
                                                <option value="11:00">11:00 h.</option>
                                                <option value="11:30">11:30 h.</option>
                                                <option value="12:00">12:00 h.</option>
                                                <option value="12:30">12:30 h.</option>
                                                <option value="13:00">13:00 h.</option>
                                                <option value="13:30">13:30 h.</option>
                                                <option value="14:00">14:00 h.</option>
                                                <option value="14:30">14:30 h.</option>
                                                <option value="15:00">15:00 h.</option>
                                                <option value="15:30">15:30 h.</option>
                                                <option value="16:00">16:00 h.</option>
                                                <option value="16:30">16:30 h.</option>
                                                <option value="17:00">17:00 h.</option>
                                                <option value="17:30">17:30 h.</option>
                                                <option value="18:00">18:00 h.</option>
                                                <option value="18:30">18:30 h.</option>
                                                <option value="19:00">19:00 h.</option>
                                                <option value="19:30">19:30 h.</option>
                                                <option value="20:00">20:00 h.</option>
                                                <option value="20:30">20:30 h.</option>
                                                <option value="21:00">21:00 h.</option>
                                                <option value="21:30">21:30 h.</option>
                                                
                                            </select>
                                            <span id="invalid-feedback-start" class="invalid-feedback"></span>
                                        </div>
                                        
                                        <div class="form-group col-md-4 "> 
                                            <label for="horaFin" class="bmd-label-floating">Hora Fin</label>
                                            <select class="form-control" name="horaFin" id="horaFin">
                                                <option value="08:30">08:30 h.</option>
                                                <option value="09:00">09:00 h.</option>
                                                <option value="09:30">09:30 h.</option>
                                                <option value="10:00">10:00 h.</option>
                                                <option value="10:30">10:30 h.</option>
                                                <option value="11:00">11:00 h.</option>
                                                <option value="11:30">11:30 h.</option>
                                                <option value="12:00">12:00 h.</option>
                                                <option value="12:30">12:30 h.</option>
                                                <option value="13:00">13:00 h.</option>
                                                <option value="13:30">13:30 h.</option>
                                                <option value="14:00">14:00 h.</option>
                                                <option value="14:30">14:30 h.</option>
                                                <option value="15:00">15:00 h.</option>
                                                <option value="15:30">15:30 h.</option>
                                                <option value="16:00">16:00 h.</option>
                                                <option value="16:30">16:30 h.</option>
                                                <option value="17:00">17:00 h.</option>
                                                <option value="17:30">17:30 h.</option>
                                                <option value="18:00">18:00 h.</option>
                                                <option value="18:30">18:30 h.</option>
                                                <option value="19:00">19:00 h.</option>
                                                <option value="19:30">19:30 h.</option>
                                                <option value="20:00">20:00 h.</option>
                                                <option value="20:30">20:30 h.</option>
                                                <option value="21:00">21:00 h.</option>
                                                <option value="21:30">21:30 h.</option>
                                               
                                            </select>
                                            <span id="invalid-feedback-end" class="invalid-feedback"></span>
                                        </div>
                                       
                                        <div id="nombre_usuario" class="form-group col-md-8 responsable ">
                                            <label for="user_id" name="user_id" class="bmd-label-floating responsable">Responsable</label>
                                           
                                            <input type="hidden" name="user_id" id="user_id" class="form-control" >
                                            <input type="text" name="user_name" id="user_name" class="form-control"  readonly>
                                         
                                        </div>
                                    
                                        <div class="form-group col-md-4 customSelect ">
                                            <label for="sala_id" class="bmd-label-floating">Sala</label>
                                      
                                            <select class="form-control" id="sala_name" name="sala_name" onChange="mostrarValor(this.value);" required>
                                                <option value="empty"></option>
                                                @foreach($salas as $sala)
                                                    
                                                    <option name="sala_name"  value="{{ $sala->id ??''}}" >{{ $sala->nombre }}</option>                                                    
                                                
                                                @endforeach
                                            </select>
                                            
                                        <input type="hidden" name="sala_id" id="sala_id" class="form-control" value=""  >
                                        
                                        </div>
                                        <span id="invalid-feedback-sala_id" class="invalid-feedback"></span> 
                                        <div id="correo_usuario" class="form-group col-md-12 correo">
                                            <label for="correo" class="bmd-label-floating correo">Correo </label>
                                            <input type="text" name="user_correo" id="user_correo" class="form-control"  readonly>
                                        </div>
                                        
                                        <div class="form-group col-md-12 descripcion">
                                            <label for="descripcion" class="bmd-label-floating descripcion">Descripcion</label>
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
                            <!--</form> -->  
                            </div>
   
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>        
    
@endsection
@section('scripts')
    <script>
      

        //$('#app').css("background-image","url('/images/EURORED_BACKGROUND.jpg')");
        $('#app').css("background-position","top center");
        $('#app').css("background-repeat","no repeat");
        $('#app').css("background-attachment","fixed");
        $('#app').css("background-size","cover");
        $('#app').css("background-color","#ffffff");

        var mostrarValor = function(x) {  

        document.getElementById('sala_id').value=x;

        }
    </script>
     <script src="{{ asset('js/eventos.js?v=1.0.0') }}"></script>
@endsection
