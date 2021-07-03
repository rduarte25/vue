<?php

    include './conexion.php';
    if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

        $id   = $con->real_escape_string( htmlentities( $_REQUEST['id'] ) );
        $producto   = $con->real_escape_string( htmlentities( $_REQUEST['producto'] ) );
        $precio     = $con->real_escape_string( htmlentities( $_REQUEST['precio'] ) );
        $cantidad   = $con->real_escape_string( htmlentities( $_REQUEST['cantidad'] ) );
        $categoria  = $con->real_escape_string( htmlentities( $_REQUEST['categoria'] ) );


        $up = $con->prepare("UPDATE inventario SET producto = ?, precio = ?, cantidad = ?, categoria = ? WHERE id = ?");

        $up->bind_param("sdisi",$producto,$precio,$cantidad,$categoria,$id);

        if( $up->execute() ) {
            echo 'actualizado';
            header("location:index.php");
        } else {
            echo 'no actualizado';
        }

        $up->close();
        $con->close();

    } else {

        echo    "<script>
                    alert('Utiliza el formulario por favor');
                    location.href='index.php'
                </script>";

    }
    
?>