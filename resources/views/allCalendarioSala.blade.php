@extends('layouts.calendarstile')
@section('content')

    <div class="row-calendar">
        <div class="panel-salas">
            <div class="card-header">
                <div class="row" >
                        
                    <h3>Salas</h3>
                                
                </div>
            </div>
            <div class="card-body-salas">
                 
                    <ul class="salas-nombre">
                        <li style="padding-left: 10px;line-height:25px;margin-left: -15px; border: 1px solid rgba(0, 0, 0, 0.12);border-radius: 0.125rem;padding-right: 10px; padding-top: 3px;color:#000!important;background-color:#FFF!important;">
                                
                            <a href="/calendar" class= "sala-nombresala" style="color:#000!important;" >
                                General
                            </a>
                                                
                        </li>
                        @foreach ($salas as $sal) 
                        <li style="padding-left: 10px;line-height:25px;margin-left: -15px; border: 1px solid rgba(0, 0, 0, 0.12);border-radius: 0.125rem;padding-right: 10px; padding-top: 3px;color:#000!important;background-color:{{$sal->color}}!important;">
                                
                            <a href="/calendar/{{ $sal->nombre }}" class= "sala-nombresala" style="color:#000!important;"  value="{{$sal->id}}" >
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
                        <input type="hidden" id="nombreSala" name="nombreSala" value="{{ $sala->nombre }}">
                        <h3>Calendario {{ $sala->nombre }}</h3>         
                    </div>      
                </div>
            </div>

            <div class="card-body">
    
                <div id='calendarAllSala'></div>
               
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
    <script src="{{ asset('js/eventosAllSala.js?v=1.0.0') }}"></script>
@endsection
