<?php 
session_start();
$varsesion = $_SESSION["tipo"];

if($varsesion == null || $varsesion = ''){
    echo "<script  languaje=’javascript’>alert('No Se ha Iniciado Sesion ');window.location='index.html'</script>";
    die();
}
if (!isset($_SESSION['tipo'])){
  header('location: index.html');
}else{
  if($_SESSION['tipo'] !=2){
    header('location:inicio.php');
  }
}
?>
    <link href="imagenes/ex.jpg" rel="icon">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Almacen</title>
    <?php require 'conexion.php'?>
    <?php  include "includes/header.php"; ?>

     <div class="container-fluid mt-6 col-lg-9">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" 
                                    data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap"><i class="bi bi-person-plus-fill"></i>Agregar</button>
                                   <h2> <center> <p class="text-muted">Almacen</center></h2>
                </div>
                <div class="card-body">
                            <div class="table-responsive">
                                <table id="usuario" class="table table-hover" width="100%" cellspacing="0">
                                <thead>
                            <tr>
                                <th>Articulo</th>
                                <th>Costo</th>
                                <th>Marca</th>
                                <th>Departamento</th>
                                <th>imagen</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        
                        <?php 
                              $sql="SELECT * from almacen";
                             $result=mysqli_query($conexion,$sql);
                              while($fila=mysqli_fetch_array($result)){
                                ?>
                                 </tfoot>
                            <tr>
                                <td><?php echo $fila['articulo']?></td>
                                <td><?php echo $fila['costo']?></td> 
                                <td><?php echo $fila['marca']?></td>
                                <td><?php echo $fila['departamento']?></td>
                                <td><img height="70px" src="data:image/jpg;base64,<?php echo base64_encode($fila['imagen']);?>"/></td>
                                <td>
                                    <a href="verAlmacen.php?id=<?php echo $fila['id']?>" class="btn btn-info"><i class="bi bi-clipboard-check"></i></a>

                                <a href="editAlmacen.php?id=<?php echo $fila['id']?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                 <a class="btn btn-danger" href="eliminarAlmac.php?id=<?php echo $fila['id']?>"  onclick="return confirm('¿Estas seguro?');"><i class="fas fa-trash"></i></a>
                              
                                </td>
                            </tr>
                            </tfoot>
                            <?php 
                              }
                              ?>
                        
                    </table>
                </div>
                </div>
                    </div>
    </div>

    <script>
    $(document).ready(function(){
        var tabla = $("#usuario").DataTable({
               "createdRow":function(row,data,index){                   
              
               }, 
        });

    });
    </script>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Articulo Nuevo  <i class="bi bi-person-plus"></i></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST"  action="almace.php" enctype="multipart/form-data">
                        <label>Nombre del articulo  </label>
                        <input   placeholder=""  type="text" name="articulo" class="form-control" />
                        <label>Costo</label>
                        <input placeholder=""   type="text" name="costo" class="form-control" />
                        <label>Marca</label>
                        <input   type="text" name="marca" class="form-control" />
                        <label>Imagen</label>
                        <input   type="file" name="imagen" class="form-control" />
                        <label>Departamento</label>
                        <select class="form-control" name="departamento">
                        <option >Articulos</option>
                        <option >Audifonos</option>
                        <option >Consumibles</option>
                        <option >Cables</option>

                        </select> <br>  
      </div>
      <div class="modal-footer">
      <input type="submit" value="Agregar" class="btn btn-success"/>
      </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
   
      </div>
    </div>
  </div>
</div>