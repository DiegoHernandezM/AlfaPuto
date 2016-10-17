<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Tienda Virtual Online - Dashboard</a>&nbsp; 
      <i class="fa fa-dashboard"></i>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      
    <!--<form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>-->
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ url('admin/sliders') }}">Slider</a></li>
      	<li><a href="{{  url('admin/providers') }}"> Proveedores</a></li>
        <li><a href="#"> Productos</a></li>
        <li><a href="#"> Pedidos</a></li>
        <li><a href="#"> Usuarios</a></li>
      	<li class="dropdown">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
          <i class="fa fa-user"></i> {{ Auth::user()->user }} <span class="caret"></span>
         </a>
         <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
  </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>