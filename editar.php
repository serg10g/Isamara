<html>

    <head>
    <link href="imagenes/ex.jpg" rel="icon">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Editar</title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </head>
    
    <?php
      ini_set('date.timezone', 'America/Mexico_City');
      $fecha = date('d/m/Y H:i:s' );

include 'conexion.php';
$id= $_GET['id'];
$sql="SELECT * from principal where id='$id'";
$result=mysqli_query($conexion,$sql);
while($fila=mysqli_fetch_array($result)){
    ?>
    <body>
    <div class="container-fluid mt-4 col-lg-4">
        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                    <h4>Actualizar registro</h4>
                </div>
                <div class="card-body">
                <form method="POST" >
                        
                        <input type="hidden" name="id" class="form-control" value="<?php echo $fila['id']?>" >
                        <label>Fecha</label>
                        <input  type="datetime" name="fecha" class="form-control" value="<?=$fecha?>">
                        <label>Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="<?php echo $fila['nombre']?>">
                        <label>Apellido</label>
                        <input type="text" name="apellido" class="form-control" value="<?php echo $fila['apellido']?>" >
                        <label>Telefono</label>
                        <input type="number" name="telefono" class="form-control"value="<?php echo $fila['telefono']?>" >
                        <label>Empresa </label>
                        <input type="text" name="modelo" class="form-control"value="<?php echo $fila['modelo']?>">
                        <label>Descripcion del viaje</label>
                        <input type="text" name="descripcion" class="form-control"value="<?php echo $fila['descripcion']?>" >
                        <label>Lugar de Destino</label>
                        <input type="text" name="problema" class="form-control" value="<?php echo $fila['problema']?>">
                        <label>Descripcion de la carga</label>
                        <input type="text" name="descripcion_r" class="form-control" value="<?php echo $fila['descripcion_r']?>">
                        <label>Presupuesto</label>
                        <input type="text" name="presupuesto" class="form-control" value="<?php echo $fila['presupuesto']?> ">
                        <label>Tipo de Transporte </label>
               <select class="form-control" name="reparacion">
                 <option selected="selected"><?php echo $fila['reparacion']?> </option>
                 <option>Camioneta de mudanza </option>
                         <option>Camion cerrado</option>
                           <option>Camiones rígidos</option>
                             <option>Camiones articulados </option>
                               <option>Camión de plataforma abierta</option>
                                 <option>Camión con lona </option>
                                 <option> Camión de transporte refrigerado</option>
                                 <option>Camión contenedor </option>
                  </select>
                  <label  >Estado</label>
                  <select class="form-control" name="estado">
                  <option selected="selected"><?php echo $fila['estado']?> </option>
                <option > Entregado </option>
                     <option> En Camino</option>
                       
                </select>
             <!--     <label for="exampleColorInput" class="form-label">Color Del Equipo</label>
<input type="color" name="color" class="form-control form-control-color" id="exampleColorInput" value="<?php echo $fila['color']?>" ><br>
                 --><br>
                 <center>
                        <input type="submit" value="Actualizar" class="btn btn-success"/>
                        <a href="registro.php" class="btn btn-primary">Regresar</a>
                        </center>
                    </form>
                    <?php   }?>
                </div>
                <?php

$id= $_POST['id'];
$fecha= $_POST['fecha'];
$reparacion = $_POST['reparacion'];
$nombre = $_POST['nombre'];
$apellido= $_POST['apellido'];
$telefono = $_POST['telefono'];
$modelo = $_POST['modelo'];
$descripcion = $_POST['descripcion'];
$problema = $_POST['problema'];
$descripcion_r = $_POST['descripcion_r'];
$presupuesto = $_POST['presupuesto'];
$estado = $_POST['estado'];
$color = $_POST['color'];
$sql="UPDATE principal SET reparacion='$reparacion',nombre='$nombre',apellido='$apellido',telefono='$telefono',modelo='$modelo',descripcion='$descripcion',problema='$problema',descripcion_r='$descripcion_r',presupuesto='$presupuesto',estado='$estado',color='$color' where  id='$id'";
$result=mysqli_query($conexion,$sql);
if($fila!=$id){
        Header("Location:registro.php");
    }
?>
            </div>
        </div>
    </body>
</html>