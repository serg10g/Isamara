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
    <meta http-equiv="Content=Type" content="text/html; CHASET=utf=8">
    <link href="imagenes/ex.png" rel="icon">
    <?php  include "includes/header.php"; ?>
    <link rel="stylesheet" type="text/css" href="css/head.css">
    <TITLE> Servicio </TITLE>
  </head>
    <body>
  
    
    <?php  include "conexion.php"; 
    require 'conexion.php';
    ini_set('date.timezone', 'America/Mexico_City');
    $fecha = date('d/m/Y H:i:s' );
    ?>


    <div class="container">
    
<!-- DataTales  -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
   <h4>   Agregar Orden De Servicio <i class="bi bi-plus-circle"></i></h4>
    </div>
    <center>
<form action="Principale.php" name="principale"   method="POST" class="row g-3 needs-validation" novalidate>

    <div class="col-md-3 position-relative">
    <label for="validationTooltipUsername" class="form-label">Fecha y Hora</label>
    <div class="input-group has-validation">
      <input  type="datetime" name="fecha" value="<?=$fecha?>" class="form-control" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" required>
    </div>
  </div>
  <div class="col-md-3 position-relative">
    <label for="validationTooltip04" class="form-label">Tipo de Transporte </label>
    <select name="reparacion" class="form-select" id="validationTooltip04" required>
    <option selected="selected">Camioneta de mudanza  </option>
                         <option>Camion cerrado</option>
                           <option>Camiones rígidos</option>
                             <option>Camiones articulados </option>
                               <option>Camión de plataforma abierta</option>
                                 <option>Camión con lona </option>
                                 <option> Camión de transporte refrigerado</option>
                                 <option>Camión contenedor </option>
                      </select>
    <div class="invalid-tooltip">
      Seleccione el tipo de Transporte 
    </div>
  </div>

  <div class="col-md-3 position-relative">
    <label for="validationTooltip05" class="form-label">Telefono</label>
    <input type="number" name="telefono" autocomplete="off" class="form-control" id="validationTooltip05" required>
    <div class="invalid-tooltip">
      Introdusca tipo de Mercansia
    </div>
  </div>
 
  
  <div class="col-md-5 position-relative">
    <label for="validationTooltip01" class="form-label">Nombre(s) del cliente</label>
    <input type="text" name="nombre"  autocomplete="off" class="form-control" id="validationTooltip01"  required>
    <div class="invalid-tooltip">
      Porfavor coloque Nombre
    </div>
  </div>

  <div class="col-md-5 position-relative">
    <label for="validationTooltip02" class="form-label">Apellido</label>
    <input type="text" name="apellido" autocomplete="off" class="form-control" id="validationTooltip02"  required>
    <div class="invalid-tooltip">
      Porfavor coloque el Apellido
    </div>
  </div>
 

<div>  

  <div class="col-md-6 position-relative">
    <label for="validationTooltip03" class="form-label">Empresa </label>
    <input type="text" name="modelo" class="form-control" id="validationTooltip03" required>
    <div class="invalid-tooltip">
     Coloque la Empresa 
    </div>
  </div>
  <div class="col-md-6 position-relative">
    <label for="validationTooltip03" class="form-label">Lugar de Destino</label>
    <input type="text" name="problema" autocomplete="off" class="form-control" id="validationTooltip03" required>
    <div class="invalid-tooltip">
      Coloque el Lugar donde se destina la carga 
    </div>
  </div>
  <div class="col-md-6 position-relative">
    <label for="validationTooltip03" class="form-label">Descripcion del viaje</label>
    <input type="text" name="descripcion" autocomplete="off"  class="form-control" id="validationTooltip03" required>
    <div class="invalid-tooltip">
      Descripcion del viaje 
    </div>
  </div>
  
  <div class="col-md-6 position-relative">
    <label for="validationTooltip03" class="form-label">Descripcion de la carga </label>
    <input type="text" name="descripcion_r"  autocomplete="off" class="form-control" id="validationTooltip03" required>
    <div class="invalid-tooltip">
      Descripcion de la carga 
    </div>
  </div>
  <!--<div class="col-md-2 position">
    <label for="validationTooltip03" class="form-label">Adelanto </label>
    <input type="number" name="cuenta" autocomplete="off" class="form-control" id="validationTooltip03" required>
    <div class="invalid-tooltip">
      Porfavor coloque el monton que deja 
    </div> 
  </div>-->
  <div class="col-md-2 position">
    <label for="validationTooltip03" class="form-label">Presupuesto</label>
    <input type="number" name="presupuesto" autocomplete="off" class="form-control" id="validationTooltip03" required>
    <div class="invalid-tooltip">
      Porfavor coloque el Presupuesto
    </div>
  </div>


 <!--- <label for="exampleColorInput" class="form-label">Color Del Equipo</label>
<input type="color" name="color" class="form-control form-control-color" id="exampleColorInput" value="#563d7c" title="Color"><br>
</div>--->

<br>
  <div class="col-12">
    <button class="btn btn-danger" name="Registrar" type="submit">Registrar</button>
    <input class="btn btn-danger" type="reset"  value="Cancelar" >
  </div>
  </center>
 
    </div>
</div>
    
</form>
<script> (function () {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
  
          form.classList.add('was-validated')
        }, false)
      })
  })() </script>



 </div></center>

  </body>
</html>
