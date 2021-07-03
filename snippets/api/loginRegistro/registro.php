<?php 

    include '../conexion.php';


    if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

        $user = $con->real_escape_string( htmlentities( $_POST['user'] ) );
        $password = $con->real_escape_string( htmlentities( $_POST['password'] ) );
        $email = $con->real_escape_string( htmlentities( $_POST['email'] ) );

        $extension = '';

        $ruta = '../api/loginRegistro/foto_perfil';

        $archivo = $_FILES['foto']['tmp_name'];

        $nombreArchivo = $_FILES['foto']['name'];

        $info = pathinfo($nombreArchivo);

        if ( $archivo != '' ) {
            $extension = $info['extension'];
            if( $extension == 'png' or $extension == 'PNG' or $extension == 'jpg' or $extension == 'JPG') {
                $nombreFile = $user . rand(0000, 9999) . '.' . $extension;
                move_uploaded_file($archivo, 'foto_perfil/' . $nombreFile);
                $ruta = $ruta . '/' . $nombreFile;
            } else {
                echo 'fail';
                exit();
            }
        } else {
            $ruta = '../api/loginRegistro/foto_perfil/perfil.jpg';
        }

    } else {
        header('location:../../index.php');
    }

    $passwordEncrypt = password_hash($password, PASSWORD_BCRYPT);
    
    $ins = $con->prepare("INSERT INTO users VALUES(?,?,?,?,?)");

    $ins->bind_param("issss",$id,$user,$email,$passwordEncrypt,$ruta);

    if( $ins->execute() ) {
        echo 'success';
    } else {
        echo 'fail';
    }

?>