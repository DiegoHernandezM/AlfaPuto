<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Tienda Virtual Online</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      
    <!--<form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>-->
      <ul class="nav navbar-nav navbar-right">
      	<li><a href="{{ route('home')}}"><i class="fa fa-home"></i>&nbsp; Inicio</a></li>
      	<li><a href="{{ route('about')}}"><i class="fa fa-users"></i>&nbsp; Acerca de</a></li>
      	<li><a href="{{ route('contact')}}"><i class="fa fa-envelope"></i>&nbsp; Contacto</a></li>
       <li><a href="{{ route('cart-show') }}"><i class="fa fa-shopping-cart"></i>&nbsp; Tus Compras</a></li>
        
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user"></i>&nbsp; Usuarios <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Iniciar sesión</a></li>
            <li><a href="{{ route('questions')}}">Preguntas y Respuestas</a></li>
            <li><a href="{{ route('mapsite')}}">Mapa de sitio</a></li><hr>
            <li><a href="{{ route('privacy')}}">Aviso de Privacidad</a></li>
            <li></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>