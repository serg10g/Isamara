
<?php  
  session_start();
  
include "includes/header.php";
      include "conexion.php"; 

  


$errors = array();

if (isset($_POST['usuario']) and isset($_POST['clave'])) {
	# code...
	include('conexion.php');
	$usuario = mysqli_real_escape_string($conexion,$_POST['usuario']);
	$contrasena = mysqli_real_escape_string($conexion,$_POST['clave']);

	$query = "SELECT * FROM usuarios WHERE usuario='$usuario' ";
	$res = $conexion->query($query);

	if ($row = mysqli_fetch_array($res)) {
		# code...
		if ($row["clave"] == $contrasena) {
			# code...
			$_SESSION["k_username"] = $row['usuario'];
			$_SESSION["k_password"] = $row['clave'];
			$_SESSION["name"]= $row['nombre'];
			
			//$_SESSION["e-mail"]=$row['correo'];
			$_SESSION["iduser"]=$row['correo'];
			$_SESSION["tipo"]=$row['tipo'];

			header('Location:inicio.php');
		}else{

			echo "<script  languaje=’javascript’>alert('LA CONTRASEÑA NO ES CORRECTA');window.location='index.html'</script>";

		}

	}else{
		echo "<script  languaje=’javascript’>alert('EL NOMBRE DE USUARIO O CONTRASEÑA NO ES CORRECTO');window.location='index.html'</script>";
	}
	mysqli_free_result($res);

}else{
	header('Location:index.html');
}



mysqli_close($conexion);

?>
