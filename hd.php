<html>
	<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/head.css">

  </head>
  <nav class="navbar navbar-default" role="navigation">
      
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse"
                  data-target=".navbar-ex1-collapse">
            <span class="sr-only">Desplegar navegación</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="principal.php"><img src="imagenes/ogo.jpg"></a>
        </div>
       
        <div  class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav navbar-center"  class="nav navbar-nav">
            <li class="dropdown"><a href="inicio.php"><i class="glyphicon glyphicon-home"></i> Incio</a></li>
            <li><a href="clientes.php"><i class="glyphicon glyphicon-user"></i>  Clientes</a></li>
            <li class="dropdown">
              <a href="#" class=" dropdown-toggle" data-toggle="dropdown"></i><i class="glyphicon glyphicon-credit-card"> </i> Admin <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="admin1.php"><i class="glyphicon glyphicon-list-alt"></i> Administrador</a></li>
                <li class="divider"></li>
                <li><a href="Usuarios.php"><i class="glyphicon glyphicon-user"></i> usuarios</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-plus"></i>
                Ordenes <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a href="principal.php"><i class="glyphicon glyphicon-edit"></i> Nueva</a></li>
                <li class="divider"></li>
                <li><a href="registro.php"><i class="glyphicon glyphicon-list-alt"></i> Registro</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Salir <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <a> <img src="imagenes/user.png"  ></a>
                <li class="divider"></li>
                <li><a href="gastos.php"><i class="glyphicon glyphicon-lock"></i> Gasto</a></li>
                <li class="divider"></li>
                <li><a href="index.html"><i class="glyphicon glyphicon-lock"></i> Cerrar</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
</html>