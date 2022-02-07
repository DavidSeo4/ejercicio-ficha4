<?php
// comprueba que el usuario haya abierto sesión o redirige/
require_once 'sesiones.php';
require_once 'bd.php';
comprobar_sesion();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset= "UTF-8">
        <title>Carrito de la compra</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/comun.css">
        <script src="../components/header.js"></script>
    </head>
    <body>
    <header-component></header-component>
        <?php
        require 'cabecera.php';
        echo "<h2>Carrito de la compra</h2>";
        $productos = cargar_productos (array_keys ($_SESSION['carrito']));
        if($productos === FALSE){
            echo "<p>No hay productos en el pedido</p>";
            exit;
        }
        
        echo "<table>"; //abrir la tabla
        echo "<tr><th>Nombre</th><th>Descripción</th><th>Peso</th><th>Unidades</th><th>Eliminar</th></tr>";
        foreach ($productos as $producto){
            $cod = $producto['CodProd'];
            $nom = $producto['Nombre'];
            $des = $producto['Descripcion'];
            $peso = $producto['Peso'];
            $unidades = $_SESSION['carrito'][$cod];
            echo "<tr><td>$nom</td><td>$des</td><td>$peso</td><td>$unidades</td>
            <td>
            <form action = 'eliminar.php' method = 'POST'>
            <input name = 'unidades' type='number' min = '1'value = '1'>
            <input type = 'submit' value='Eliminar'></td>
            <input name = 'cod' type='hidden' value='$cod'>
            </form>
            </td>
            </tr>";
        }
        echo "</table>";
        ?>
        <hr>
        <a href = "procesar_pedido.php">Realizar pedido</a>
    </body>
</html>