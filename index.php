<?php
//comprueba que el usuario haya abierto sesión o redirige/ 
require './ficheros/sesiones.php';
require_once './ficheros/bd.php';
comprobar_sesion();
header("Location: ficheros/login.php");
?>

