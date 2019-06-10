<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>TORNEO</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet">
  
  <!-- Custom styles for this template -->
  <link href="{{ asset('assets/css/simple-sidebar.css') }}" rel="stylesheet">

  <!-- CDN Data Table No Borrar -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  
  <link rel="stylesheet" href="{{ asset('assets/vendor/DataTables/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/DataTables/css/dataTables.bootstrap4.min.css') }}">
  
     @yield('cabeceras') 
</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading bg-primary text-white">Opciones </div>
      <div class="list-group list-group-flush">
        <a href="../jugador/registros" class="list-group-item list-group-item-action bg-light">Jugadores</a>
        <a href="../equipo/registros" class="list-group-item list-group-item-action bg-light">Equipos</a>
        <a href="../torneo/registros" class="list-group-item list-group-item-action bg-light">Torneos</a>
        <a href="../director/registros" class="list-group-item list-group-item-action bg-light">Director</a>
        <a href="../jugador_equipo/registros" class="list-group-item list-group-item-action bg-light">Jugadores a Equipos</a>
        <a href="../torneos" class="list-group-item list-group-item-action bg-light">Informacion Arbitral</a>
        <a href="../tabla_general" class="list-group-item list-group-item-action bg-light">Tabla General</a>
        <a href="../seleccionar" class="list-group-item list-group-item-action bg-light">Generar Fixture</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="/">Inicio <span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
          @yield('content')   
      </div>
      
       {{-- <div class="container-fluid">
              <img src="assets/img/fut.jpg" class="img-fluid">
        
        <h1 class="mt-4">Simple Sidebar</h1>
        <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>. The top navbar is optional, and just for demonstration. Just create an element with the <code>#menu-toggle</code> ID which will toggle the menu when clicked.</p>
      </div> --}}    
    </div> 

    

<!-- Modal -->
    <!-- /#page-content-wrapper -->
   
   
  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery/jquery-3.3.1.js') }}"></script>

  <!-- DataTable Script NO BORRAR -->
  
  
  <script src="{{ asset('assets/vendor/DataTables/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/DataTables/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/js/fixture/crud_script.js') }}"></script>
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
