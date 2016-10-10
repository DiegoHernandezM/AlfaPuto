@if(Auth::check())


            <i class="fa fa-user"></i> {{ Auth::user()->user }} <span class="caret"></span>

            <li><a href="{{ route('logout') }}">Finalizar sesión</a></li>


@else



            <li><a href="{{ route('login-get') }}">Iniciar sesión</a></li>
            <li><a href="{{ route('register-get') }}">Registrarse</a></li>

    </li>
@endif