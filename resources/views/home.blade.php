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
                        @foreach ($salas as $sala) 
                        <li style="padding-left: 10px;line-height:25px;margin-left: -15px; border: 1px solid rgba(0, 0, 0, 0.12);border-radius: 0.125rem;padding-right: 10px; padding-top: 3px;color:#000!important;background-color:{{$sala->color}}!important;">
                                
                            <a href="/calendar/{{ $sala->nombre }}" class= "sala-nombresala" style="color:#000!important;"  value="{{$sala->id}}" >
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
                       
                            <h3>Calendario General</h3>
                              
                    </div>      
                </div>
            </div>

            <div class="card-body">
    
                <div id='calendarAll'></div>
               
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

       
    </script>
    <script src="{{ asset('js/eventosAll.js?v=1.0.0') }}"></script>
@endsection
