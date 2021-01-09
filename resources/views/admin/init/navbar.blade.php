{{---
class="{{request()->is('/ruta')?'active':''}}"
---}}

<nav class="pcoded-navbar menu-light ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div ">
            <div class="">
                <div class="main-menu-header">
                    @if(\Illuminate\Support\Facades\Auth::user()->url_image==='#')
                        <img class="img-radius" src="{{asset('img/user.jpg')}}"
                             alt="User-Profile-Image">
                    @else
                        <img class="img-radius" src="{{\Illuminate\Support\Facades\Auth::user()->url_image}}"
                             alt="User-Profile-Image">
                    @endif
                    <div class="user-details">
                        <div id="more-details">{{\Illuminate\Support\Facades\Auth::user()->name}} <i
                                class="fa fa-caret-down"></i></div>
                    </div>
                </div>
                <div class="collapse" id="nav-user-link">
                    <ul class="list-inline">
                        {{----
                        <li class="list-inline-item"><a href="user-profile.html" data-toggle="tooltip"
                                                        title="View Profile"><i class="feather icon-user"></i></a></li>
                        <li class="list-inline-item"><a href="email_inbox.html"><i class="feather icon-mail"
                                                                                   data-toggle="tooltip"
                                                                                   title="Messages"></i><small
                                    class="badge badge-pill badge-primary">5</small></a></li>
                                    ---}}
                        <li class="list-inline-item">
                            <a href="{{ route('logout') }}" data-toggle="tooltip"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                               title="Cerrar sesión" class="text-danger">
                                <i class="feather icon-power"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>


                        </li>
                    </ul>
                </div>
            </div>

            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <a href="" class="nav-link ">
                        <label>Panel de control</label>
                    </a>
                    
                </li>
              
               
                @can('read_role')
                <li class="nav-item pcoded-hasmenu">
                    <a href="javascript: return void();" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-home"></i>
                        </span>
                        <span class="pcoded-mtext">Accesos</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{route('roles')}}">Roles & Permisos</a></li>
                        <li><a href="">Crear rol</a></li>
                    </ul>
                </li>
                @endcan
                <li class="nav-item pcoded-hasmenu">
                    <a href="javascript: return void();" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-layout"></i>
                        </span>
                        <span class="pcoded-mtext">Estudiantes</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{route('students')}}">Estudiantes</a></li>
                        <li><a href="{{route('levelstudent')}}">Inscripciones</a></li>
                    </ul>
                </li>
                @can('read_subject')
                <li class="nav-item pcoded-hasmenu">
                    <a href="javascript: return void();" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-layout"></i>
                        </span>
                        <span class="pcoded-mtext">Materias</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{route('subjects')}}">Lista de materias</a></li>
                    </ul>
                </li>
                @endcan

                @can('read_techier')
                <li class="nav-item pcoded-hasmenu">
                    <a href="javascript: return void();" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-layout"></i>
                        </span>
                        <span class="pcoded-mtext">Profesores</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{route('teachers')}}">Lista de profesores</a></li>
                    </ul>
                </li>
                @endcan

                @can('read_level')
                <li class="nav-item pcoded-hasmenu">
                    <a href="javascript: return void();" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-layout"></i>
                        </span>
                        <span class="pcoded-mtext">Ciclos</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{route('levels')}}">Ciclos</a></li>
                    </ul>
                </li>
                @endcan
                @can('read_task')
                <li class="nav-item pcoded-hasmenu">
                    <a href="javascript: return void();" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-layout"></i>
                        </span>
                        <span class="pcoded-mtext">Tareas</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{route('tasks')}}">Tareas</a></li>
                    </ul>
                </li>
                @endcan
                @can('read_file')
                <li class="nav-item pcoded-hasmenu">
                    <a href="javascript: return void();" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-layout"></i>
                        </span>
                        <span class="pcoded-mtext">Archivos</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{route('files')}}">Archivos</a></li>
                    </ul>
                </li>
                @endcan
                 <li class="nav-item pcoded-hasmenu">
                    <a href="javascript: return void();" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-layout"></i>
                        </span>
                        <span class="pcoded-mtext">Configuraciones</span>
                    </a>
                    <ul class="pcoded-submenu">
                      
                        <li><a href="{{route('periods')}}">Periodos</a></li>
                
                        @can('read_course')
                        <li><a href="{{route('courses')}}">Cursos</a></li>
                        @endcan
                       
                    </ul>
                </li>
              
            </ul>
        </div>
    </div>
</nav>
