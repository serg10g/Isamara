
  <?php  
  include 'includes/header.php';
  include 'conexion.php';
  if($_POST['buscar']) 
  {   
     ?>  
  
     
     <div class="container-fluid">
                      <div class="card shadow mb-4">
                                     <h3> <center> <p class="text-muted">Busqueda : Registro de servicios</center></h3>
                                   
                          <div class="card-body">
                              <div class="table-responsive">
                                  <table class="table table-hover" width="100%" cellspacing="0">
                                  <thead>
                                          <tr>
                                  <th>FECHA</th>
                                  <th>NOMBRE</th>
                                  <th>APELLIDO</th>
                                  <th>MODELO DEL EQUIPO</th>
                                  <th>PROBLEMA DEL EQUIPO</th>
                                  <th>DESCRIPCION DE LA REPARACION</th>
                                  <th>PRESUPUESTO</th>
                              </tr>
                          </thead>
                         
         <?php
         $buscar = $_POST["palabra"];
         $consulta_mysql="SELECT * FROM principal WHERE nombre like '%$buscar%' or apellido like '%$buscar%' or id like '%$buscar%' or fecha like '%$buscar%' or modelo like '%$buscar%' ";
         $result=mysqli_query($conexion,$consulta_mysql);
         
         while($fila = mysqli_fetch_assoc($result)) 
         {
             ?> 
          
             <tr>
                                  <td><?php echo $fila['fecha']?></td>
                                  <td><?php echo $fila['id']?></td>
                                  <td><?php echo $fila['nombre']?><?php echo $fila['apellido']?></td> 
                                  <td><?php echo $fila['modelo']?></td>
                                  <td><?php echo $fila['problema']?></td>
                                  <td><?php echo $fila['descripcion_r']?></td>
                                  <td><?php echo $fila['presupuesto']?></td>
                            
                             
                      
  
                              </tr>
                              <?php 
         } 
      ?>
      </table>
      <?php
  } 
  ?>
  
  </table>
                  </div>
              </div>
          </div>
          </div>
  