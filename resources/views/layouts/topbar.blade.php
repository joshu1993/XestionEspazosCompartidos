
    
    <div class="navbar navbar-prmary">
        <div class="container-fluid">        
            <ul class="nav-top-bar navbar-nav-top-bar navbar-left menu-superior-izquierda"> 
                <div class="menu-izquierda-topbar">   
                    <li><a class="btn-primary-opciones-menu" href="/salas"><span class=""></span>Salas</a></li>
                    @if (  Auth::user()->role_id==1 )
                    <li><a class="btn-primary-opciones-menu" href="/usuarios"><span class=""></span>Usuarios</a></li>
                    <li><a class="btn-primary-opciones-menu" href="/eventos"><span class=""></span>Eventos</a></li>
                    @else
                    <li><a class="btn-primary-opciones-menu" href="/eventos"><span class=""></span>Reservas</a></li>
                    @endif
                    <li><a class="btn-primary-opciones-menu" href="/calendario"><span class=""></span>Calendario</a></li>
                </div>
            </ul>
            <div class="nombre-proyecto menu-superior-centro ">   
                <h6 class="Xestion-espazos-compartidos">Xestion Espazos Compartidos</h6>
            </div>

            <!-- Right Side Of Navbar -->
            

            <ul class="nav-top-bar navbar-nav-top-bar derecha navbar-right menu-superior-derecha">
                @if (  Auth::user()->role_id==1 || Auth::user()->role_id==2 || Auth::user()->role_id==3  )   
                <div class="nombre-usuario">    
                    <li>
                        <a class="session-user" href="{{ '/usuario/'.\Auth::user()->id }}"  >
                            {{ Auth::user()->name}}
                        </a>
                    </li>  
                    <li><a class="session-user" href="{{ route('logout') }}" >{{ __('Cerrar sesion') }} </a></li>
                </div> 
                @else  
                <div class="nombre-usuario">    
                   
                    <li><a class="session-user" href="{{ route('login') }}" >{{ __('Iniciar sesion') }} </a></li>
                </div>  
                @endif  
            </ul>
            
        </div>              
    </div>

       
   

