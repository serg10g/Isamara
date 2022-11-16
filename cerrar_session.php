<?php 
require_once 'inicio_session.php';

session_start();
// remove all session variables
session_unset();
//Destruye sesion
session_destroy();

header('Location:index.html');

?>