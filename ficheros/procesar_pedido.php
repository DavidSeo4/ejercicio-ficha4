<?php
// comprueba que el usuario haya abierto sesion o redirige
require '..\correo\enviar_correo.php';
require 'sesiones.php';
require_once 'bd.php';
comprobar_sesion();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
</head>
<body>
    <?php
    require 'cabecera.php';
    $resul = insertar_pedido ($_SESSION['carrito'],
    $_SESSION['usuario']['codRes']);
    if ($resul === FALSE){
        echo "No se ha podido realizar el pedido<br>";
    } else{
        $correo = $_SESSION['usuario']['correo'];
        echo "Pedido realizado correctamente<br>";
        // vaciar carrito
        $compra = $_SESSION['carrito'];
        $_SESSION['carrito'] = [];
        echo "Pedido realizado con exito.
        Se enviará un correo de confirmacion a: $correo";
        enviar_correos($compra,$pedido, $correo);
    }
    ?>
    
</body>
</html>