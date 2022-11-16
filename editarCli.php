<html>

    <head>
    <link href="imagenes/ex.jpg" rel="icon">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>clientes </title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    </head>
    <?php
include 'conexion.php';
$id= $_GET['id'];
$sql="SELECT * from  clientes where id='$id'";
$result=mysqli_query($conexion,$sql);
while($fila=mysqli_fetch_array($result)){
    ?>
    <body>
        <div class="container-fluid mt-4 col-lg-4">
        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                    <h4>Actualizar Clientes</h4>
                </div>
                <div class="card-body">
                <form method="POST" >
                <input type="hidden" name="id" class="form-control" value="<?php echo $fila['id']?>" >
                        <label>Nombre</label>
                        <input type="text" name="nombre_c" class="form-control" value="<?php echo $fila['nombre_c']?>">
                        <label>Correo</label>
                        <input type="email" name="correo" class="form-control" value="<?php echo $fila['correo']?>">
                        <label>Numero</label>
                        <input type="number" name="numero" class="form-control" value="<?php echo $fila['numero']?>" >
      <br>
                        <input type="submit" value="Actualizar" class="btn btn-success"/>
                        <a href="clientes.php" class="btn btn-primary">Regresar</a>
                        </form>
                    <?php   }?>
                </div>
                <?php
$id= $_POST['id'];
$correo = $_POST['correo'];
$nombre_c = $_POST['nombre_c'];
$numero = $_POST['numero'];


$sqli="UPDATE  clientes SET correo='$correo',nombre_c='$nombre_c',numero='$numero' where  id='$id'";
$result=mysqli_query($conexion,$sqli);
if($fila!=$id){

        Header("Location:clientes.php");
    }
?>
            </div>
        </div>
    </body>
</html>

