<?php 

    include '../conexion.php';

    $tmp = array();

    $results = array();

    $sel = $con->query( "SELECT * FROM snippets ORDER BY id DESC" );

    while( $f = $sel->fetch_assoc()) {
        $tmp = $f;
        array_push($results, $tmp);
    }

    echo json_encode($results);

    $sel->close();
    $con->close();

?>