<?php 
session_start();
$varsesion = $_SESSION["tipo"];

if($varsesion == null || $varsesion = ''){
    echo "<script  languaje=’javascript’>alert('No Se ha Iniciado Sesion ');window.location='index.html'</script>";
    die();
}

?>
<html>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Clientes</title>
        <link href="imagenes/ex.jpg" rel="icon">
        <?php require 'conexion.php';?>
        <?php  include "includes/header.php"; ?>
  <body>

  <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header  ">
                                   <h3> <center> <p class="text-muted">Ordenes de Servicio</center></h3>
                </div>
                <div class="table-responsive">
                    <table id="registros" class="table table-sm table-hover"  style="width:100%"  >
                        <thead>
                            <tr>
                                <th>FECHA</th>
                                <th>TIPO DE TRANSPORTE</th>
                                <th>NOMBRE</th>
                                <th>APELLIDO</th>
                                <th>TELEFONO</th>
                                <th>EMPRESA</th>
                                <th>DESCRIPCION DEL VIAJE</th>
                                <th>LUGAR DE DESTINO</th>
                                <th>DESCRIPCION DE LA CARGA</th>
                                <th>PRESUPUESTO</th>
                                <th>ESTADO</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
        $sql="SELECT * from principal";
        $result=mysqli_query($conexion,$sql);
        while($fila=mysqli_fetch_array($result)){
         ?>
                            <tr>
                                <td><?php echo $fila['fecha']?></td>
                                <td><?php echo $fila['reparacion']?></td>
                                <td><?php echo $fila['nombre']?></td> 
                                <td><?php echo $fila['apellido']?></td>
                                <td><?php echo $fila['telefono']?></td>
                                <td><?php echo $fila['modelo']?></td>
                                <td><?php echo $fila['descripcion']?></td>
                                <td><?php echo $fila['problema']?></td>
                                <td><?php echo $fila['descripcion_r']?></td>
                                <td><?php echo $fila['presupuesto']?></td>
                                <td><?php echo $fila['estado']?></td>
                             <!--   <td><?php echo $fila['color']?></td> -->
                    
                                <td>
                                    <a href="editar.php?id=<?php echo $fila['id']?>" class="btn btn-warning">Editar</a>
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
    

        <script>
    $(document).ready(function(){
        var tabla = $("#registros").DataTable({
               "createdRow":function(row,data,index){  
                   //pintar una celda
                   if(data[12] == 'No reparado'){
                       /* $('td', row).eq(3).css({
                           'background-color':'#ff5252',
                           'color':'white', 
                       }); */
                   
                    //pintar una fila
                    $('td', row).css({
                           'background-color':'#ff5252',
                           'color':'white',
                           'border-style':'solid',
                           'border-color':'#bdbdbd' 
                       });
                   }
               },  
        });

    });
    </script>

    </body>
</html>