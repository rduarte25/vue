<?php 
        
    include './conexion.php';

    $id   = $con->real_escape_string( htmlentities( $_GET['id'] ) );

    $sel = $con->query( "SELECT id, producto, precio, cantidad, categoria FROM inventario WHERE id = '$id'" );

    if( $row = $sel->fetch_assoc() ){

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>CRUD</title>
</head>
<body>
    <nav class="navbar navabr-light bg-info">
        <a href="#" class="navbar-brand">CRUD</a>
    </nav>
    <div class="container" style="padding-top: 30px;">
        <form action="actualizar.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <input type="text" name="producto" id="producto" placeholder="Producto" class="form-control" value="<?php echo $row['producto']; ?>" >
            </div>
            <div class="form-group">
                <input type="number" name="precio" id="precio" placeholder="Precio" class="form-control" step="0.01" value="<?php echo $row['precio']; ?>" >
            </div>
            <div class="form-group">
                <input type="text" name="cantidad" id="cantidad" placeholder="Cantidad" class="form-control" value="<?php echo $row['cantidad']; ?>" >
            </div>
            <div class="form-group">
                <input type="text" name="categoria" id="categoria" placeholder="Categoria" class="form-control" value="<?php echo $row['categoria']; ?>" >
            </div>
            <div class="form-group">
                <input type="submit" name="submit" id="submit" class="btn btn-info" value="Guardar">
            </div>
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>