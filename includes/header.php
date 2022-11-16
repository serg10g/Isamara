
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link href="imagenes/ex.png" rel="icon">
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="css/sb-admin-2.min.css" rel="stylesheet">
<div class="shadow-lg p-3 mb-5 bg-body rounded">
<nav class="navbar navbar-expand-lg navbar-light bg-light">

<div><a class="navbar-brand" href="principal.php"><img src="imagenes/ogo.png"></a>   </div>

  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        
    <!--  Datatables JS-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>   
    <!-- SUM()  Datatables-->
    <script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>

    
<div class="container-fluid" >
<div class="nav nav-tabs">

 
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
      <ul class="nav navbar-nav navbar-center">

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="inicio.php"><i class="bi bi-house-door-fill"></i>  Inicio</a>
        </li>

       

<br>
        <li class="nav-item dropdown" role="presentation">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="bi bi-pen-fill"></i>Admin</a>
    <ul class="dropdown-menu">
       <li><a class="dropdown-item" href="admin1.php"><img src="iconos/toggles2.svg">  Administrador</a></li>
       <li class="divider"></li>
       <li><a class="dropdown-item" href="Usuarios.php"><i class="bi bi-person-plus"></i>  Usuarios</a></li>
       <li class="divider"></li>
       <li><a class="dropdown-item" href="almacen.php"><i class="bi bi-hdd-stack"></i>  Asignacion</a></li>
    </ul>
  </li>


    <li class="nav-item dropdown" role="presentation">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="bi bi-pencil-square"></i>  Ordenes</a>
    <ul class="dropdown-menu">
     <li><a class="dropdown-item" href="Principal.php"><i class="bi bi-plus-lg"></i>  Nueva</a></li>
     <li class="divider"></li>
     <li><a class="dropdown-item" href="registro.php"><i class="bi bi-receipt-cutoff"><link  rel="icon"   href="iconos/carrito.svg" type="image/png" ></i> Registro</a></li>
    </ul>
  </li>
  </ul>
  </div>
    </div>


    <ul class="nav navbar-nav navbar">
    <li class="nav-item dropdown" role="presentation">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">Salir</a>
    <ul class="dropdown-menu">
                <a> <img src="imagenes/user.png"  ></a>
    
                <li><a class="dropdown-item"  href="gastos.php"><img src="iconos/cash-coin.svg">  Gasto</a></li>
                <li class="dropdown-divider"></li>
                <li><a class="dropdown-item"  href="cerrar_session.php"><img src="iconos/box-arrow-right.svg">  Cerrar</a></li>
              </ul>
            </li>
          </ul>
  
     
  </div>
  </div>
</nav>
</div>
<script> var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
  return new bootstrap.Dropdown(dropdownToggleEl)
}) </script>
