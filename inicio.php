<?php 
session_start();
if(!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
$granTotal = 0;

$varsesion = $_SESSION["tipo"];

if($varsesion == null || $varsesion = ''){
    echo"<script  languaje=’javascript’>alert('No Se ha Iniciado Sesion ');window.location='index.html'</script>";
    die();
}
?>

  <html>

  <TITLE> Inicio </TITLE>
    <head>
  
        <link href="imagenes/ex.jpg" rel="icon">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <?php  include "includes/header.php"; ?>
       
    </head>
  
<?php

  require 'conexion.php';
  ini_set('date.timezone', 'America/Mexico_City');
  $fecha = date('d/m/Y');


$sqlA = "SELECT * FROM clientes ";
$query = $conexion->query($sqlA); //total de clientes 
$clientest = $query->num_rows;

$sqlB="SELECT * from principal";
$queryA = $conexion->query($sqlB);
$countProductA = $queryA->num_rows;//total de ordenes de servicio(Todas sin incluir dias)

$sql2 = "SELECT * FROM pedidos ";
$query = $conexion->query($sql2);//no de pedidos 
$Pedidos = $query->num_rows;

$sqlB="SELECT nombre from principal where estado =  'Entregado' ";
$queryA = $conexion->query($sqlB);
$countProduct = $queryA->num_rows;//estado =REPARADOS

$sqlB="SELECT nombre from principal where estado =  'En camino' ";
$queryA = $conexion->query($sqlB);
$countProduct1 = $queryA->num_rows;//estado = No reparados 


$sql = "SELECT sum(presupuesto) from principal";
$q = $conexion-> query($sql);
$row = mysqli_fetch_array($q); //suma total de presupuesto 

$sql = "SELECT sum(monto) from gasto";
$q = $conexion-> query($sql);
$GASTOS = mysqli_fetch_array($q);//suma toal de gasto 

$sqlG = "SELECT sum(presupuesto-cuenta) as resto FROM principal";
$gas = $conexion-> query($sqlG);
$restan = mysqli_fetch_array($gas); // resta de algo

$sql = "SELECT sum(total) from ventas ";
$q = $conexion-> query($sql);
$dia = mysqli_fetch_array($q);  //gastos del dia 



?>
<!--
<button type="button" class="btn btn-primary position-relative" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
<i class="bi bi-laptop-fill"></i> Pedidios
  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
  <?php echo $Pedidos; ?> 
    <span class="visually-hidden">unread messages</span>
  </span>
</button>-->


<div class="offcanvas offcanvas-end"  id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Pedidos y Pendientes </h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" 
data-bs-whatever="@getbootstrap"><i class="bi bi-person-plus-fill"></i>Agregar Pedidios</button>
  <div class="offcanvas-body">
  
                    <div class="card shadow mb-8">
                        <div class="card-header py-2">
                                   <!--agregar pedido -->
<h3> <center> <p class="text-muted">Pedidos</center></h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" width="100%" cellspacing="0px">
                                <thead>
                                        <tr>
                                <th>Pedido</th>
                                <th>Costo</th>
                                <th>Fecha</th>
                                <th></th>
                                        </tr>
                                    </thead>
                             
                        <?php 
                              $sql="SELECT * from pedidos ";
                             $result=mysqli_query($conexion,$sql);
                              while($fila=mysqli_fetch_array($result)){
                                ?>
                                  
                            <tr>
                                <td><?php echo $fila['pedido']?></td>
                                <td><?php echo $fila['costo']?></td>
                                <td><?php echo $fila['fecha']?></td>
                                <td>
  <a class="btn btn-outline-danger" href="eliminarPed.php?id=<?php echo $fila['id']?>"  onclick="return confirm('¿Estas seguro?');"> <i class="fas fa-trash"></i></a>
 
                                </td>
                            </tr>
                          
                            <?php 
                              }
                              ?>
                        </tbody>
                    </table>
        </div>
	</div><!---pedidos--->


</div>
       </div>
  </div>
</div>

<br><br>
<div class="my-2"></div>
                                   

<div class="modal body" id="exampleModal" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo  <i class="bi bi-person-plus"></i></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST"  action="agregarPed.php" >
                    
                        <label>Pedido</label>
                        <input    type="text" name="pedido" class="form-control" />
                        <label>Costo</label>
                        <input   placeholder="Costo"  type="number" name="costo" class="form-control" />
                        <label>Fecha</label>
                        <input  type="datetime" name="fecha" value="<?=$fecha?>" class="form-control" /><br>
                 
      </div>
      <div class="modal-footer">
      <input type="submit" value="Agregar" class="btn btn-success"/>
      </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
   
      </div>
    </div>
  </div>
</div>

 
  <div class="row">

 <!-- Earnings (Monthly) Card Example 
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                    Presupuesto Total  </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">$ <?php echo  $row[0] ?>    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>-->

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Gastos
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                       
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">$<?php echo $GASTOS[0]; ?></div>
                        </div>
                        <div class="col">
                            <div class="progress progress-sm mr-2">
                                <div class="progress-bar bg-info" role="progressbar"
                                    style="width: 30%" aria-valuenow="50" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">N# DE Servicios
                       </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countProductA; ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">No Entregados
                        </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countProduct1; ?></div>
                </div>
                <div class="col-auto">
                    <i class="bi bi-receipt fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Venta del Dia <?php echo $fecha ?>
                        </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $dia[0] ; ?></div>
                </div>
                <div class="col-auto">
                    <i class="bi bi-cash fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>-->



                    <div class="row">
                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Venta de Servicio </h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      
                                        </a>
                                        
                                    </div>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                    <div class="">
		<?php
			if(isset($_GET["status"])){
				if($_GET["status"] === "1"){
					?>
						<div class="alert alert-success">
							<strong><i class="bi bi-cart4"></i></strong> Venta realizada correctamente
						</div>
					<?php
				}else if($_GET["status"] === "2"){
					?>
					<div class="alert alert-info">
							<strong><i class="bi bi-cart-x-fill"></i> Venta cancelada</strong>
						</div>
					<?php
				}else if($_GET["status"] === "3"){
					?>
					<div class="alert alert-info">
							<strong><i class="bi bi-cart-dash-fill"></i></strong> Producto quitado de la lista
						</div>
					<?php
				}else if($_GET["status"] === "4"){
					?>
					<div class="alert alert-danger">
							<strong><i class="bi bi-exclamation-triangle-fill"></i></strong> El producto que buscas no existe
						</div>
					<?php
				}else if($_GET["status"] === "5"){
					?>
					<div class="alert alert-danger">
							<strong><i class="bi bi-exclamation-diamond-fill"></i> </strong>El producto está agotado
						</div>
					<?php
				}else{
					?>
					<div class="alert alert-danger">
							<strong><i class="bi bi-exclamation-circle-fill"></i></strong> Algo salió mal mientras se realizaba la venta
						</div>
					<?php
				}
			}
		?>
	
		<form method="post" action="agregarAlCarrito.php">
			<label for="codigo">Folio:</label>
			<input autocomplete="off" autofocus class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el Folio">
		</form>
		
		<table class="table table-sm table-hover" >
			<thead>
				<tr>
					<th>Folio</th>
					<th>Nombre</th>
					<th>Tipo de reparacion</th>
					<th>Descripción</th>
					<th>Modelo</th>
                    <th>Anticipo</th>
                    <th>Restan</th>
					<th>Total</th>
					<th>Quitar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($_SESSION["carrito"] as $indice => $producto){ 
						$granTotal += $producto->total;
                
					?>
				<tr>
					<td><?php echo $producto->id ?></td>
					<td><?php echo $producto->nombre ?>  <?php echo $producto->apellido ?></td>
					<td><?php echo $producto->reparacion ?></td>
					<td><?php echo $producto->descripcion_r ?></td>
					<td><?php echo $producto->modelo?></td>
                    <td><?php echo $producto->cuenta ?></td>
                    <td><?php echo $restan['resto']; ?></td>
					<td><?php echo $producto->total ?></td>
					<td><a class="btn btn-danger" href="<?php echo "quitarDelCarrito.php?indice=" . $indice?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

		<h3>Total: <?php echo $granTotal; ?></h3>
		<form action="terminarVenta.php" method="POST">
			<input name="total" type="hidden" value="<?php echo $granTotal;?>">
			<button type="submit" class="btn btn-success">Terminar venta</button>
			<a href="cancelarVenta.php" class="btn btn-danger">Cancelar venta</a>
		</form>
	</div>
                                             
                                    </div>
                                </div>
                            </div>
                        </div>

                         <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Equipos Entregados</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        </a>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                <div class="overflow-auto">
                                    <div class="chart-pie pt-4 pb-2">
                                    <?php 
                              $sql="SELECT  nombre,id from principal where estado= 'Entregado'";
                             $result=mysqli_query($conexion,$sql);
                              while($fila=mysqli_fetch_array($result)){
                                ?>
                         <table style="height: 40px;">
    <tr>
      <td class="align-baseline"><?php echo $fila['id']?>   <i class="bi bi-bag-check-fill">  </i>  <?php echo $fila['nombre']?></td>
    </tr>
</table>
                            <?php  }?>
                                    </div>
                              </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                        <i class="bi bi-bag-check-fill"></i> Reparado  <span class="badge bg-secondary">
                                            <?php echo $countProduct; ?>
                                        </span>
                                    </div>
                            </div>
                              </div>
                        </div>