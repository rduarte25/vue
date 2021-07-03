<?php 

    include '../conexion.php';

    $id   = $con->real_escape_string( htmlentities( $_GET['id'] ) );

    $tmp = array();

    $results = array();

    $sel = $con->query( "SELECT * FROM snippets WHERE id = '$id'" );

    //while( $f = $sel->fetch_assoc()) {
    //    $tmp = $f;
    //    array_push($results, $tmp);
    //}

    echo json_encode($results = $sel->fetch_assoc() );

    $sel->close();
    $con->close();

?>