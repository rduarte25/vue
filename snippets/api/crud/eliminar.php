<?php 

    include '../conexion.php';

    $id   = $con->real_escape_string( htmlentities( $_GET['id'] ) );

    $del = $con->prepare( "DELETE FROM snippets WHERE id = ?" );

    $del->bind_param("i",$titulo,$codigo,$descripcion,$id);

    if( $del->execute() ) {
        echo 'success';
    } else {
        echo 'fail';
    }

    $sel->close();
    $con->close();

?>