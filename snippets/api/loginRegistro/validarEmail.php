<?php 

    include '../conexion.php';

    if( $_SERVER['REQUEST_METHOD' == 'POST'] ) {
        $correo = $con->real_escape_string( htmlentities( $_POST['correo'] ) );

        $sel = $con->query("SELECT email FROM users WHERE email = '$correo'");

        $num = mysqli_num_rows($sel);

        if( $num == 0 ) {
            echo 'success';
        } else {
            echo 'fail';
        }
    }

    
?>