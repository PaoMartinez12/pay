<nav id="sidebar" class="" style="background-color: black">
    <div class="custom-menu">
        <button type="button" id="sidebarCollapse" class="btn ">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
        </button>
    </div>
    <div class="p-4">
    <h1><a href="#" class="logo"><img src="{{asset('img/logos/Icono.jpg')}}"  width="55px" height="50px"> Beenet</a></h1>
        
        <ul class="list-unstyled components mb-5">
            <li class="active">
                <a href="{{ route('home') }}"><span class="fa fa-home mr-3"></span> Home</a>
            </li>
            <li>
                <a href="{{ route('info') }}"><span class="fa fa-user mr-3"></span> Mi Perfil </a>
            </li>
            <li>
                <a href="{{ route('all_Invoices') }}"><span class="fa fa-file-text-o mr-3"></span> Mis Facturas </a>
            </li>
            <li>
            <a href="{{ route('logout') }}"><span class="fa fa-sign-out mr-3"></span> Cerrar Sesion </a>
            </li>
        </ul>

        {{-- Footer --}}
        @include('layout.partials.footer')
    </div>
</nav>