    <h2>Usuarios</h2>


    <div class="container py-4">


        <p>
            <a href="./usuarios/agregar" class="btn btn-primary">Agregar</a>
        </p>



        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th>id</th>
                    <th>nombre</th>
                    <th>email</th>
                </tr>
            </thead>

            <tbody>

                <?php
                foreach ($usuarios as $usuario) {
                ?>
                    <tr>
                        <td><?php echo $usuario->id; ?></td>
                        <td><?php echo $usuario->nombre; ?></td>
                        <td><?php echo $usuario->email; ?></td>
        
                        <td>
                            <a href="./usuarios/eliminar/<?php echo $usuario->id; ?>" class="btn btn-danger">Eliminar</a>
                            <a href="./usuarios/editar/<?php echo $usuario->id; ?>" class="btn btn-primary">Editar</a>
                        </td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>

    </div>
