<?php

    include './conexion.php';
    if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

        $producto   = $con->real_escape_string( htmlentities( $_REQUEST['producto'] ) );
        $precio     = $con->real_escape_string( htmlentities( $_REQUEST['precio'] ) );
        $cantidad   = $con->real_escape_string( htmlentities( $_REQUEST['cantidad'] ) );
        $categoria  = $con->real_escape_string( htmlentities( $_REQUEST['categoria'] ) );

        $id = '';

        $ins = $con->prepare("INSERT INTO inventario VALUES(?,?,?,?,?)");

        $ins->bind_param("isdis",$id,$producto,$precio,$cantidad,$categoria);

        if( $ins->execute() ) {
            echo 'guardo';
            header("location:index.php");
        } else {
            echo 'no guardo';
        }

        $ins->close();
        $con->close();

    } else {

        echo    "<script>
                    alert('Utiliza el formulario por favor');
                    location.href='index.php'
                </script>";

    }
    
?>