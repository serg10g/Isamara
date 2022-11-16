<html>

    <head>
    <link href="imagenes/ex.jpg" rel="icon">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Editar</title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    
    <?php
include 'conexion.php';
$id= $_GET['id'];
$sql="SELECT * from  usuarios where id='$id'";
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
                        <label>correo</label>
                        <input type="email" name="correo" class="form-control" value="<?php echo $fila['correo']?>">
                        <label>usuario</label>
                        <input type="text" name="usuario" class="form-control" value="<?php echo $fila['usuario']?>">
                        <label>clave</label>
                        <input type="password" name="clave" class="form-control" value="<?php echo $fila['clave']?>" >
                        <label>Tipo de Usuario</label>
                        <select class="form-control" name="tipo">
                        <option value =1 >Empleado</option>
                        <option value=2 >Administrador</option>
                        </select> <br>

                        <input type="submit" value="Actualizar" class="btn btn-success"/>
                        <a href="Usuarios.php" class="btn btn-primary">Regresar</a>
                        </form>
                    <?php   }?>
                </div>
                <?php
$id= $_POST['id'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
$tipo = $_POST['tipo'];

$sqli="UPDATE  usuarios SET correo='$correo',usuario='$usuario',clave='$clave',tipo='$tipo' where  id='$id'";
$result=mysqli_query($conexion,$sqli);
if($fila!=$id){

        Header("Location:Usuarios.php");
    }
?>
            </div>
        </div>

        
   