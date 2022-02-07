<?php
use PHPMailer\PHPMailer\PHPMailer;
// require dirname(__FILE__). "../vendor/autoload.php";
require_once '../vendor/autoload.php';
function enviar_correos($carrito, $pedido, $correo){
    $cuerpo = crear_correo($carrito, $pedido, $correo);
    return enviar_correo_multiples("$correo", "pedidos@empresa.com", "$cuerpo", "Pedido $pedido confirmado");
}

// crear correo
function crear_correo($carrito, $pedido, $correo){
    $texto = "<h1>Pedido nº $pedido</h1><h2>Restaurante: $correo </h2>";
    $texto.= "Detalle del pedido:";
    $productos = cargar_productos(array_keys($carrito));

    $texto.= "<table>"; //abrir la tabla
    $texto.= "<tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Peso</th>
                <th>Unidades</th>
                <th>Eliminar</th>
            </tr>";
    foreach ($productos as $producto){
        $cod = $producto['CodProd'];
        $nom = $producto['Nombre'];
        $des = $producto['Descripcion'];
        $peso = $producto['Peso'];
        $unidades = $_SESSION['carrito'][$cod];		
        $texto.= "<tr>
                    <td>$nom</td>
                    <td>$des</td>
                    <td>$peso</td>
                    <td>$unidades</td>
                </tr>";
    }
    $texto.= "</table>";
    return $texto;
}

// sin codigo
function enviar_correo_multiples($lista_correos, $cuerpo, $asunto=""){
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMPTDebug = 0;
    $mail->SMTPAuth=TRUE;
    $mail->Host = "smtp";
    $mail->Port=587;
    $mail->Username="";
    $mail->Password="";
    $mail->setFrom('noreplay@empresafalsa.com','Sistema de Pedidos');
    $mail->Subject=$asunto;
    $mail->msgHTML($cuerpo);
    //partir la lista de correos por la coma
    $correos = explode(",",$lista_correos);
    foreach($correos as $correo){
        $mail->AddAddress($correo, $correo);
    } 
    if (!$mail->Send()){
        return $mail ->ErrorInfo;
    } else {
        return TRUE;
    }
}

// sin codigo

?>