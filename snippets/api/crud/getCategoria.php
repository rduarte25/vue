<?php 

    include '../conexion.php';

    $cat   = $con->real_escape_string( htmlentities( $_GET['cat'] ) );

    $tmp = array();

    $results = array();

    $sel = $con->query( "SELECT * FROM snippets WHERE categoria = '$cat'" );

    while( $f = $sel->fetch_assoc()) {
        $tmp = $f;
        array_push($results, $tmp);
    }

    echo json_encode($results);

    $sel->close();
    $con->close();

?>