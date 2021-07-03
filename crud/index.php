<?php 
        
    include './conexion.php';

    $sel = $con->query( 'SELECT id, producto, precio, cantidad, categoria FROM inventario' );

    

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
    <nav class="navbar navabr-light bg-warning">
        <a href="#" class="navbar-brand">CRUD</a>
    </nav>
    <div class="container" style="padding-top: 30px;">
        <form action="guardar.php" method="post">

        <div class="form-group">
                <input type="text" name="producto" id="producto" placeholder="Producto" class="form-control">
            </div>
            <div class="form-group">
                <input type="number" name="precio" id="precio" placeholder="Precio" class="form-control" step="0.01">
            </div>
            <div class="form-group">
                <input type="text" name="cantidad" id="cantidad" placeholder="Cantidad" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="categoria" id="categoria" placeholder="Categoria" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" id="submit" class="btn btn-info" value="Guardar">
            </div>
            
        </form>
    </div>
    <div class="container">
        
        <table class="table">
            
            <th>Producto</th>
            <th>Precion</th>
            <th>Cantidad</th>
            <th>Categoria</th>
            <th>Editar</th>
            <th>Eliminar</th>
            <?php while($row = $sel->fetch_assoc()){ ?>
                <tr>
                    <td><?php echo $row['producto'] ?></td>
                    <td><?php echo "$" . number_format($row['precio'],2) ?></td>
                    <td><?php echo $row['cantidad'] ?></td>
                    <td><?php echo $row['categoria'] ?></td>
                    
                    <td><a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-warning">Editar</a></td>
                    <td><a href="eliminar.php?id=<?php echo $row['id']?>" class="btn btn-danger">Eliminar</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>