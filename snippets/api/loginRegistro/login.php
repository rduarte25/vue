<?php 

include '../conexion.php';


    if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

        $email = $con->real_escape_string( htmlentities( $_POST['email'] ) );

        $password = $con->real_escape_string( htmlentities( $_POST['password'] ) );
        
        $sel = $con->query("SELECT `user`,`email`,`password`,`foto` FROM users WHERE email = '$email'");

        if(  $results = $sel->fetch_assoc() ) {
           $user = $results['user'];
           $correo = $results['email'];
           $passwordEnc = $results['password'];
           $foto = $results['foto'];

        }

        $passwordEncrypt = password_verify($password, $passwordEnc);

        if( $email == $correo && $passwordEncrypt == true ) {
            $_SESSION['user']     = $user;
            $_SESSION['foto']     = $foto;
            echo 'success';
        } else {
            echo 'fail';
        }


    }


?>