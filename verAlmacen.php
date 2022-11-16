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
                       <center>   <div class="card-header py-3">
                    <h4>   <?php echo $fila['articulo']?></h4>
                </div>
                <div class="card-body">
          
                       <input type="hidden" name="id" class="form-control" value="<?php echo $fila['id']?>" >
                

                   <br>
                   <img height="175px" src="data:image/jpg;base64,<?php echo base64_encode($fila['imagen']);?>"/><br>


                       <h5> <label>Costo: </label></h5>
                       <h6> <?php echo $fila['costo']?></h6> <br>


                       <h5> <label>Marca:</label></h5>
                        <?php echo $fila['marca']?><br>
   
                       <br>
                      <h5>  <label>Departamento: </label></h5>
                        <?php echo $fila['departamento']?><br><br>


                        
                        <a href="almacen.php" class="btn btn-primary">Regresar</a>
                        
                    <?php   }?>
                </div>
            </div>
        </div> </center>
