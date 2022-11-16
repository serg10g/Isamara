<?php 
session_start();
$varsesion = $_SESSION["tipo"];

if($varsesion == null || $varsesion = ''){
    echo "<script  languaje=’javascript’>alert('No Se ha Iniciado Sesion ');window.location='index.html'</script>";
    die();
}

?>
<html>
    <head>
    <title>Gastos</title>
    <link href="imagenes/ex.jpg" rel="icon">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Clientes</title>
    <?php  include "includes/header.php"; ?>
    <?php  include "conexion.php"; ?>
       
    </head>
    <body>
    <div class="container-sm ">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                       
                                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" 
                                    data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap"><i class="bi bi-person-plus-fill"></i>Agregar</button>
                                   <h3> <center> <p class="text-muted">Clientes</center></h3>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="cliente" class="table table-hover" width="100%" cellspacing="0">
                                <thead>
                                        <tr>
                                <th>Folio</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Numero</th>
                                <th>Opciones</th>
                                        </tr>
                                    </thead>
                             
                        <?php 
                              $sql="SELECT * from clientes";
                             $result=mysqli_query($conexion,$sql);
                              while($fila=mysqli_fetch_array($result)){
                                ?>
                                   </tfoot>
                            <tr>
                                <td><?php echo $fila['id']?></td>
                                <td><?php echo $fila['nombre_c']?></td>
                                <td><?php echo $fila['correo']?></td>
                                <td><?php echo $fila['numero']?></td>
                                <td>
  <a href="editarCli.php?id=<?php echo $fila['id']?>" class="btn btn-outline-warning"><i class="bi bi-pencil-square"></i></a>
  <a class="btn btn-outline-danger" href="eliminarCli.php?id=<?php echo $fila['id']?>"  onclick="return confirm('¿Estas seguro?');"> <i class="fas fa-trash"></i></a>
 
                                </td>
                            </tr>
                            </tfoot>
                            <?php 
                              }
                              ?>
                        </tbody>
                    </table>
        </div>
	</div>
</div>
       </div>
                           


    <script>
    $(document).ready(function(){
        var tabla = $("#cliente").DataTable({
               "createdRow":function(row,data,index){                   
              
               }, 
        });

    });
    </script>

    </body>
   
</html>
  <!-- Footer -->
  <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright SCC&copy; 2021 PcExpertSystem</span>
                    </div>
                </div>
            </footer>

          

   
            <!-- End of Footer -->
           

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Cliente <i class="bi bi-person-plus"></i></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST"  action="agregarClia.php" >
                        <label>Nombre de Cliente</label>
                        <input placeholder="Nombre de Usuario"   type="text" name="nombre_c" class="form-control" />
                        <label>Correo</label>
                        <input   placeholder="E-mail"  type="email" name="correo" class="form-control" />
                        <label>Numero</label>
                        <input    type="number" name="numero" class="form-control" /><br>
                      
                    
                 
                   
      </div>
      <div class="modal-footer">
      <input type="submit" value="Agregar" class="btn btn-success"/>
      </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
   
      </div>
    </div>
  </div>
</div>



