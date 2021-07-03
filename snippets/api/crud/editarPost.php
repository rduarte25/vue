<?php 

    include '../conexion.php';

    foreach($_POST as $campo => $valor) {
        $var = "$" . $campo . "='" . $valor . "';";
        eval($var);
    }
    
    $up = $con->prepare("UPDATE snippets SET titulo = ?, codigo = ?, descripcion = ?, categoria = ? WHERE id = ?");
    $up->bind_param("ssssi",$titulo,$codigo,$descripcion,$categoria);

    if( $up->execute() ) {
        echo 'success';
    } else {
        echo 'fail';
    }

    $ins->close();
    $con->close();

?>