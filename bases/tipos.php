<?php
function mostrar_tipos() {
    include "conectar.php";
    $consulta = $conexion->prepare("select * from tipos_evento order by tipo");
    $consulta->execute();
    return $consulta;
}

function nuevo_tipo($tipo,$imagen){
    include "conectar.php";    
    $sql = "insert tipos_evento (tipo,imagen) "
            . "values (?,?)";
    $bind = array($tipo,basename($imagen['name']));
    $consulta = $conexion->prepare($sql);
    if ($consulta->execute($bind)) {
        //echo "Registro guardado...";
        $dir_subida = 'imagenes/';
        $fichero_subido = $dir_subida . basename($imagen['name']);

        //echo '<pre>';
        if (move_uploaded_file($imagen['tmp_name'], $fichero_subido)) {
            //echo "El fichero es válido y se subió con éxito.\n";
        } else {
            //echo "¡Posible ataque de subida de ficheros!\n";
        }

        //echo 'Más información de depuración:';
        //print_r($imagen);

        //print "</pre>";
        header("Location: tipos.php?resultado=ok");
    }
    else {
    //print_r($consulta->errorInfo());
        $arreglo=$consulta->errorInfo();
    header("Location: tipos.php?resultado=".$arreglo[1]);
    }
}

function eliminar_tipo($id){
    include "conectar.php";    
    $sql = "delete from tipos_evento where id_tipo=?";
    $bind = array($id);
    $consulta = $conexion->prepare($sql);
    if ($consulta->execute($bind)) {
    //echo "Registro eliminado...";
        header("Location: tipos.php?resultado=ok");
    }
    else {
        $arreglo=$consulta->errorInfo();
        header("Location: tipos.php?resultado=".$arreglo[1]);
    }
}

function modificar_tipo($tipo,$imagen,$id){
    include "conectar.php";    
    $sql = "update tipos_evento set tipo=?,imagen=? where id_tipo=?";
    $bind = array($tipo,$imagen,$id);
    $consulta = $conexion->prepare($sql);
    if ($consulta->execute($bind)) {
    //echo "Registro modificado...";
        header("Location: tipos.php?resultado=ok");
    }
    else {
        $arreglo=$consulta->errorInfo();
        header("Location: tipos.php?resultado=".$arreglo[1]);
    }
}

function buscar_id_tipo($id){
    include "bases/conectar.php";
    $sql = "select * from tipos_evento where id_tipo=?";
    $bind = array($id);
    $consulta = $conexion->prepare($sql);
    $consulta->execute($bind);
    $resultado=$consulta->fetch();
    return $resultado;
}
?>