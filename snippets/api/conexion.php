<?php @session_start();

    $con = new mysqli( 'localhost', 'root', '', 'db_snippets' );

    if( $con->connect_errno ) {
        die( 'La conexión no pudo establecerse.' );
    }

?>