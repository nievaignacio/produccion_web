<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Productos</title>
</head>

<body>


    <h2>Productos</h2>


    <div class="container py-4">


        <p>
            <a href="./productos/agregar" class="btn btn-primary">Agregar</a>
        </p>



        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th>id</th>
                    <th>imagen</th>
                    <th>nombre</th>
                    <th>descripcion</th>
                    <th>precio</th>
                    <th>stock</th>
                    <th>acciones</th>
                </tr>
            </thead>

            <tbody>

                <?php
                foreach ($productos as $producto) {
                ?>
                    <tr>
                        <td><?php echo $producto->id; ?></td>
                        <td><img src="<?php echo BASE_URL?>/public/uploads/<?php echo $producto->imagen; ?>" width="50"></td>
                        <td><?php echo $producto->nombre; ?></td>
                        <td><?php echo $producto->descripcion; ?></td>
                        <td><?php echo $producto->precio; ?></td>
                        <td><?php echo $producto->stock; ?></td>
                        <td>
                            <a href="./productos/eliminar/<?php echo $producto->id; ?>" class="btn btn-danger">Eliminar</a>
                            <a href="./productos/editar/<?php echo $producto->id; ?>" class="btn btn-primary">Editar</a>
                        </td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>

    </div>
</body>

</html>