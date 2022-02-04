<?php

function cargar_categorias(){
    $res = leer_config(dirname(FILE)."/configuracion.xml",dirname(FILE)."/configuracion.xsd");
    $bd = new PDO($res[0], $res[1],$res[2]);
    $ins = "select codCat, nombre from categorias";
    $result = $bd->query($ins);
    if(!$result){
        return FALSE;
    }
    if ($result->rowCount() === 0) {
        return FALSE;
    }
    //si hay 1 o más
    return $result;
}


function cargar_productos($codigosProductos){
$res = leer_config(dirname(FILE)."/configuracion.xml",
dirname(FILE). "/configuracion.xsd");
$bd = new PDO ($res[0], $res[1], $res[2]);
$texto_in = implode(",", $codigosProductos);
$ins = "select * from productos where codProd in ($texto_in)";
$resul = $bd->query($ins);
if (!$resul){
    return FALSE;
}
return $resul;
}

function insertar_pedido($carrito, $codRes){
    $res = leer_config(dirname(FILE)."/configuracion.xml", dirname(FILE)."/configuraciones.xsd");
    $bd = new PDO ($res[0], $res[1], $res[2]);
    $bd->beginTransaction();
    $hora = date("Y-m-d H:i:s", time());
    //insertar el pedido
    $sql = "insert into pedidos(fecha, enviado, restaurante)
    values('$hora',0,$codRes)";
    $resul = $bd->query($sql);
    if (!$resul) {
        return FALSE;
    }
//coger el id del nuevo pedido para las filas detalle
$pedido = $bd->lastInsertId();
//insertar las filas en pedidoproductos
foreach($carrito as $codProd=>$unidades){
    $sql = "insert into pedidosproductos(Pedido, Producto, Unidades)values($pedido, $codProd, $unidades)";
    echo $sql;
    $resul = $bd->query($sql);
    if (!$resul) {
        $bd->rollBack();
        return FALSE;
    }
    $sql = "update productos set stock = stock - $unidades where codProd = $codProd";

    $resul = $bd->query($sql);
    if ("$resul") {
$bd->rollback();
return FALSE;
    }

}
$bd->commit();
return $pedido;

}