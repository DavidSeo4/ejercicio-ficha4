<?php
//comprueba que el usuario haya abierto sesión o redirige/ 
require 'sesiones.php';
require_once 'bd.php';
comprobar_sesion();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de categorías</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/comun.css">
    <script src="../components/header.js"></script>
</head>
<body>
<header-component></header-component>
    <div class="div">
    <?php require 'cabecera.php';?>
    <h1>Lista de categorías</h1>
    <!--lista de vínculos con la forma de productos.php?categoria=1-->
    <?php
    $categorias = cargar_categorias();
    if($categorias===FALSE){
        echo "<p class='error'>Error al conectar con la base de datos</p>";
    }else{
        echo "<ul>"; //abrir la lista
        foreach($categorias as $cat){
            //$cat['nombre] $cat['codCat']/
            $url = "productos.php?categoria=".$cat['codCat'];
            echo "<li><a href='$url'>".$cat['nombre']."</a></li>";
        }
        echo "</ul>";
    }
    ?>
    </div>
</body>
</html>