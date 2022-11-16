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
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>   
        <title>Clientes</title>
        <?php  include "includes/header.php"; ?>
        <?php  include "conexion.php"; ?>
    </head>

    <body>
      <div class="container">
    <div class="card shadow mb-4">
            <div class="card-header">
                       <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" 
                       data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap"><i class="bi bi-person-plus-fill"></i>Agregar Gasto</button>
                      <h2> <center> <p class="text-muted">Gastos Extras </center></h2>
           </div>

                <table id="example" class="table table-hover " style="width:100%">
                            <thead>
                                        <tr>
                                <th>FOLIO</th>
                                <th>FECHA</th>
                                <th>CONCEPTO</th>
                                <th>MONTO</th>
                                <th>Opciones</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql="SELECT * from gasto";
                        $result=mysqli_query($conexion,$sql);
                         while($fila=mysqli_fetch_array($result)){
                           ?>
                            <tr>
                                <td><?php echo $fila['id']?></td>
                                <td><?php echo $fila['fecha']?></td>
                                <td><?php echo $fila['gasto']?></td>
                                <td><?php echo $fila['monto']?>
                                <td> 
                        
                                 <a class="btn btn-danger" href="eliminarGas.php?id=<?php echo $fila['id']?>"  onclick="return confirm('¿Estas seguro?');">eliminar</a>
                              
                                </td>
                            </tr>
                            <?php 
                              }
                              ?>
                        </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                </table> 
            </div>
      </div>


    <script>
    $(document).ready(function(){
        var tabla = $("#example").DataTable({
               "createdRow":function(row,data,index){                   
                   //pintar una celda
                   if(data[3] >= 1000){
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
                "drawCallback":function(){
                      //alert("La tabla se está recargando"); 
                      var api = this.api();
                      $(api.column(3).footer()).html(
                          'Total: '+api.column(3, {page:'current'}).data().sum()
                      )
                }
        });

        //1era forma para sum()
        var tot = tabla.column(3).data().sum();
        $("#total").text(tot);
    });
    </script>
    
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Gasto <i class="bi bi-person-plus"></i></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form  method="POST" action="insGas.php" >
                        <label>Gastos</label>
                        <input   placeholder="Gastos" type="text"  name="gasto" class="form-control" />
                        <label>Monto</label>
                        <input  type="number"   name="monto" class="form-control" />
                        <label>Fecha</label>
                        <input  type="date"   name="fecha" class="form-control" /><br>
                        
                      
                    
                 
                   
      </div>
      <div class="modal-footer">
      <input type="submit" value="Agregar" class="btn btn-success"/>
      </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
   
      </div>
    </div>
  </div>
</div>