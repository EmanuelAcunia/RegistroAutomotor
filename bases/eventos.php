<?php
function nuevo_evento($fecha,$tipo,$descripcion){
    include "conectar.php";    
    $fecha = date("Y-m-d",strtotime($fecha));
    $sql = "insert eventos (fecha,id_tipo,descripcion) "
            . "values (?,?,?)";
    $bind = array($fecha,$tipo,$descripcion);
    $consulta = $conexion->prepare($sql);
    if ($consulta->execute($bind)) {
    //echo "Registro guardado...";
        header("Location: actualizacion.php?resultado=ok");
    }
    else {
    //print_r($consulta->errorInfo());
        $arreglo=$consulta->errorInfo();
        header("Location: actualizacion.php?resultado=".$arreglo[1]);
    }
}

function eliminar_evento($id){
    include "conectar.php";    
    $sql = "delete from eventos where id_evento=?";
    $bind = array($id);
    $consulta = $conexion->prepare($sql);
    if ($consulta->execute($bind)) {
    //echo "Registro eliminado...";
        header("Location: actualizacion.php?resultado=ok");
    }
    else {
        $arreglo=$consulta->errorInfo();
        header("Location: actualizacion.php?resultado=".$arreglo[1]);
    }
}

function modificar_evento($fecha,$tipo,$descripcion,$id){
    include "conectar.php";    
    $fecha = date("Y-m-d",strtotime($fecha));
    $sql = "update eventos set fecha=?,id_tipo=?,descripcion=? where id_evento=?";
    $bind = array($fecha,$tipo,$descripcion,$id);
    $consulta = $conexion->prepare($sql);
    if ($consulta->execute($bind)) {
    //echo "Registro modificado...";
        header("Location: actualizacion.php?resultado=ok");
    }
    else {
        $arreglo=$consulta->errorInfo();
        header("Location: actualizacion.php?resultado=".$arreglo[1]);
    }
}

function buscar_id_evento($id){
    include "bases/conectar.php";
    $sql = "select * from eventos where id_evento=?";
    $bind = array($id);
    $consulta = $conexion->prepare($sql);
    $consulta->execute($bind);
    $resultado=$consulta->fetch();
    return $resultado;
}

function buscar_fecha($fecha) {
    include "bases/conectar.php";

    $sql="select * from eventos "
            . "inner join tipos_evento on eventos.id_tipo=tipos_evento.id_tipo "
            . "where fecha=?";
    $consulta=$conexion->prepare($sql);
    $fecha = date("Y-m-d",strtotime($fecha));
    //echo $fecha;
    $bind=array($fecha);
    //if ($consulta->execute($bind)) echo "ok"; else print_r($consulta->errorInfo());
    $consulta->execute($bind);
    
    return $consulta;
}
?>