<?php 

    include './conexion.php';

    $id   = $con->real_escape_string( htmlentities( $_GET['id'] ) );
    $eli = $con->prepare("DELETE FROM inventario WHERE id = ?");

    $up->bind_param("i",$id);

    if( $up->execute() ) {
        echo 'eliminado';
        header("location:index.php");
    } else {
        echo 'no eliminado';
    }

    $up->close();
    $con->close();


?>