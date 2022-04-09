@php
if (!isset($section)) {
@endphp

<div id="main-menu" class="panel panel-primary">
    <div class="panel-body">
        <ul id="main-menu-list">
            <li><a class="btn btn-primary menu" href="/salas"><span class=""></span>Salas</a></li>
            @if (  Auth::user()->role_id==1 )
            <li><a class="btn btn-primary menu" href="/usuarios"><span class=""></span>Usuarios</a></li>
            <li><a class="btn btn-primary menu" href="/usuarios"><span class=""></span>Usuarios</a></li>
            <li><a class="btn btn-primary menu " href="/eventos"><span class=""></span>Eventos</a></li>
            @else
            <li><a class="btn btn-primary menu" href="/eventos"><span class=""></span>Reservas</a></li>
            @endif
            <li><a class="btn btn-primary menu" href="/calendario"><span class=""></span>Calendario</a></li>
            <li><a class="btn btn-primary menu" href="{{ '/usuario/'.\Auth::user()->id }}">{{ Auth::user()->name}}</a></li>  
            <li><a class="btn btn-primary menu" href="{{ route('logout') }}" >{{ __('Cerrar sesion') }} </a></li> 
        </ul>
    </div>
</div>   

@php
} else {
@endphp
<div id="main-menu" class="panel panel-primary">
    <div class="panel-body">
        <ul id="main-menu-list">
            <li><a class="btn btn-primary menu" href="/salas"><span class=""></span>Salas</a></li>
            @if (  Auth::user()->role_id==1 )
            <li><a class="btn btn-primary menu" href="/usuarios"><span class=""></span>Usuarios</a></li>
            <li><a class="btn btn-primary menu" href="/usuarios"><span class=""></span>Usuarios</a></li>
            <li><a class="btn btn-primary menu " href="/eventos"><span class=""></span>Eventos</a></li>
            @else
            <li><a class="btn btn-primary menu" href="/eventos"><span class=""></span>Reservas</a></li>
            @endif
            <li><a class="btn btn-primary menu" href="/calendario"><span class=""></span>Calendario</a></li>
            <li><a class="btn btn-primary menu" href="{{ '/usuario/'.\Auth::user()->id }}">{{ Auth::user()->name}}</a></li>  
            <li><a class="btn btn-primary menu" href="{{ route('logout') }}" >{{ __('Cerrar sesion') }} </a></li> 
        </ul>
    </div>
</div> 

@php
}
@endphp