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
$sql="SELECT * from  almacen where id='$id'";
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
                <form method="POST" enctype="multipart/form-data" >
                 <input type="hidden" name="id" class="form-control" value="<?php echo $fila['id']?>" >
                        <label>Nombre de Articulo</label>
                        <input type="text" name="articulo" class="form-control" value="<?php echo $fila['articulo']?>">
                        <label>Costo</label>
                        <input type="text" name="costo" class="form-control" value="<?php echo $fila['costo']?>">
                        <label>Marca</label>
                        <input type="text" name="marca" class="form-control" value="<?php echo $fila['marca']?>" >
                        <label>Imagen</label><br>
                        <img height="70px" src="data:image/jpg;base64,<?php echo base64_encode($fila['imagen']);?>"/><br>
                        <input   type="file" name="imagen" class="form-control" /><br>
                        <label>Departamento</label>
                        <select class="form-control" name="departamento">
                        <option>Articulos</option>
                        <option>Audifonos</option>
                        <option>Consumibles</option>
                        <option>Cables</option>
                        </select> <br>  

                      </td>
                                <td>
                        </select> <br>

                        <input type="submit" value="Actualizar" class="btn btn-success"/>
                        <a href="almacen.php" class="btn btn-primary">Regresar</a>
                        </form>
                    <?php   }?>
                </div>
                <?php
$id= $_POST['id'];
$articulo = $_POST['articulo'];
$costo = $_POST['costo'];
$marca = $_POST['marca'];
$departamento = $_POST['departamento'];
$imagen =  addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

$sqli="UPDATE  almacen SET articulo='$articulo',costo='$costo',marca='$marca',imagen='$imagen',departamento='$departamento' where  id='$id'";
$result=mysqli_query($conexion,$sqli);
if($fila!=$id){

        Header("Location:almacen.php");
    }
?>
            </div>
        </div>

        
   