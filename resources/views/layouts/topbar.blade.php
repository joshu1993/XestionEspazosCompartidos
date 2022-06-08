
    
    <div class="navbar navbar-prmary">
        <div class="container-fluid"> 
            <div class="nombre-proyecto menu-superior-izquierda ">   
                <h5 class="Xestion-espazos-compartidos">Xestion Espazos Compartidos</h5>
            </div>       
            <ul class="nav-top-bar navbar-nav-top-bar navbar-left menu-superior-derecha"> 
                <div class="menu-derecha-topbar" id="myTopnav" >
                 
                    <li><a class="btn-primary-opciones-menu" href="/salas"><span class=""></span>Salas</a></li>
                    @if (  Auth::user()->role_id==1 )
                    <li><a class="btn-primary-opciones-menu" href="/usuarios"><span class=""></span>Usuarios</a></li>
                    <li><a class="btn-primary-opciones-menu" href="/eventos"><span class=""></span>Eventos</a></li>
                    @else
                    <li><a class="btn-primary-opciones-menu" href="/eventos"><span class=""></span>Reservas</a></li>
                    @endif
                    <li><a class="btn-primary-opciones-menu" href="/calendario"><span class=""></span>Calendario</a></li>
                   
                </div>
                
                <div class="nombre-usuario">    
                    <li>
                        <a class="session-user" href="{{ '/usuario/'.\Auth::user()->id }}"  >
                            {{ Auth::user()->name}}
                        </a>
                    </li>  
                    <li><a class="session-user" href="{{ route('logout') }}" >{{ __('Cerrar sesion') }} </a></li>
                </div>
                
            </ul>
            <div id="menu-icon-wrapper">
                <a id="menu-show" href="javascript:void(0)" alt="Mi Perfil">
                        <i id="menu-hamb" class="material-icons">menu</i>
                        <i id="menu-arrow" class="material-icons">arrow_forward</i>
                </a>
            </div>
        </div>              
    </div>


    

       
   

