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
        <title>Clientes</title>
    <?php require 'conexion.php'?>
    <?php  include "includes/header.php"; ?>
    
   
    <div class="container-fluid mt-6 col-lg-9">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" 
                                    data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap"><i class="bi bi-person-plus-fill"></i>Agregar</button>
                                   <h2> <center> <p class="text-muted">Usuarios</center></h2>
                </div>
                <div class="card-body">
                            <div class="table-responsive">
                                <table id="usuario" class="table table-hover" width="100%" cellspacing="0">
                                <thead>
                            <tr>
                                <th>Correo</th>
                                <th>Usuario</th>
                                <th>Clave</th>
                                <th>Tipo</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        
                        <?php 
                              $sql="SELECT * from usuarios";
                             $result=mysqli_query($conexion,$sql);
                              while($fila=mysqli_fetch_array($result)){
                                ?>
                                 </tfoot>
                            <tr>
                                <td><?php echo $fila['correo']?></td>
                                <td><?php echo $fila['usuario']?></td> 
                                <td><?php echo $fila['clave']?></td>
                                <td><?php echo $fila['tipo']?></td>
                                <td>
                                    
                                <a href="edit.php?id=<?php echo $fila['id']?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                 <a class="btn btn-danger" href="eliminaUsu.php?id=<?php echo $fila['id']?>"  onclick="return confirm('¿Estas seguro?');"><i class="fas fa-trash"></i></a>
                              
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
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario <i class="bi bi-person-plus"></i></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST"  action="usuario.php" >
                        <label>Correo</label>
                        <input   placeholder="E-mail"  type="email" name="correo" class="form-control" />
                        <label>Nombre de Usuario</label>
                        <input placeholder="Nombre de Usuario"   type="text" name="usuario" class="form-control" />
                        <label>Contraseña</label>
                        <span class="icon-key"></span><input  placeholder="&#128272"   type="password" name="clave" class="form-control" />
                        <label>Tipo de Usuario</label>
                        <select class="form-control" name="tipo">
                        <option value= 1>Empleado</option>
                        <option value= 2>Administrador</option>
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