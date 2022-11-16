<?php 
session_start();
$varsesion = $_SESSION["tipo"];

if($varsesion == null || $varsesion = ''){ //validar secion de usuario en caso de que este cierre  
    echo "<script  languaje=’javascript’>alert('No Se ha Iniciado Sesion ');window.location='index.html'</script>";
    die();
}
if (!isset($_SESSION['tipo'])){
  header('location: index.html');
}else{  // validar secion administrador 
  if($_SESSION['tipo'] !=2){  
    header('location:inicio.php');
  }
}

?>
<html>
    <head>

    <link href="imagenes/ex.jpg" rel="icon">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Clientes</title>
    <?php require 'conexion.php'?>
    <?php  include "includes/header.php"; ?>
    <link rel="stylesheet" type="text/css" href="css/scss/scrool.scss">
    </head>

    <body>

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header  ">
                <h3> <center> <p class="text-muted">Ordenes de Servicio</center></h3>
            </div>
                <div class="table-responsive">
                <div class="card-body">
                                <table id="admin" class="table table-sm table-hover"  width="100%"  >
                                <thead>
                            <tr>
                                <th>Folio</th>
                                <th>FECHA</th>
                                <th>TIPO DE TRANSPORTE</th>
                                <th>NOMBRE</th>
                                <th>TELEFONO</th>
                                <th>Empresa -- Lugar de Destino </th>
                                <th>ESTADO</th>
                                <th>OPCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                              $sql="SELECT * from principal";
                             $result=mysqli_query($conexion,$sql);
                              while($fila=mysqli_fetch_array($result)){
                                ?>
                            <tr>
                            <td><?php echo $fila['id']?></td>
                                <td><?php echo $fila['fecha']?></td>
                                <td><?php echo $fila['reparacion']?></td>
                                <td><?php echo $fila['nombre']?><?php echo $fila['apellido']?></td> 
                                <td><?php echo $fila['telefono']?></td>
                                <td><?php echo $fila['modelo']?>___<?php echo $fila['problema']?></td>
                                <td><?php echo $fila['estado'] ?> </td>
                                <td>
                                 <a href="editar.php?id=<?php echo $fila['id']?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                 <a class="btn btn-danger" href="eliminar.php?id=<?php echo $fila['id']?>"  onclick="return confirm('¿Estas seguro?');"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php 
                              }
                              ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
    </div>
    <!--
    <div class="panel-body">

<p class="text-justify" >Copia de Seguridad (Backup) de la base de datos del Sistema, se creara una copia de los datos originales que almacena la BD. El proceso de 
la copia de seguridad se completa dando clic en el boton "Expotar BD"</p>
</br>

<div class="div-action pull pull-left" style="padding-bottom:20px;">
<a href="http://localhost/phpMyAdmin/db_structure.php?server=1&db=proyectoex"><button class="btn btn-primary"  > <i class="glyphicon glyphicon-download-alt"></i>&nbsp;&nbsp;Exportar BD</button></a>
</div> <!-- /div-action -->	

</div> <!-- /panel-body -->

    <script>
    $(document).ready(function(){
        var tabla = $("#admin").DataTable({
               "createdRow":function(row,data,index){                   
              
               }, 
        });

    });
    </script> -->
  
                     <!--   <?php 
                              $sql="SELECT * from principal";
                             $queryA = $conexion->query($sql);
                             $countProductA = $queryA->num_rows;
                             ?>
                           <div class="col-md-6">
    <div class="panel panel-success">
      <div class="panel-heading">
        <a href="product.php" style="text-decoration:none;color:black;">
          Total de Clientes Oro:
          <span class="badge pull pull-right"><?php echo $countProductA; ?></span>
        </a>
      </div>
    </div> 
  </div> 

  <div class="col-md-4">
      <div class="card">
        <div class="cardHeader" style="background-color:#F44659;">
            <h1><?php echo $countProductA; ?></h1>
            </div>
            <div class="cardContainer">
            <p> <i class="glyphicon glyphicon-credit-card"></i> Total de Clientes:</p>
        </div>
      </div> 


 <div class="col-md-4">
      <div class="card">
        <div class="cardHeader" style="background-color:#F44659;">
            <h1><?php echo $vendidos; ?></h1>
            </div>
            <div class="cardContainer">
            <p> <i class="glyphicon glyphicon-credit-card"></i> Total </p>
        </div>
      </div> 
  </div>-->
    </body>        
 </html>
