            <h1><?= $usuario->nombre ?></h1>
            <p><?= $usuario->email ?>

                <a href="<?php echo BASE_URL; ?>/usuarios/logout" class="btn btn-primary position-relative">

                    Logout

                </a>

            </p>

            <h2>Compras</h2>


            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>direccion</th>
                        <th>provincia</th>
                        <th>codigo postal</th>
                        <th>total a pagar</th>
                        <th>estado</th>
                        <th>fecha</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    foreach ($compras as $compra) {
                    ?>
                        <tr>
                            <td><?php echo $compra->id; ?></td>
                            <td><?php echo $compra->direccion; ?></td>
                            <td><?php echo $compra->provincia; ?></td>
                            <td><?php echo $compra->codigoPostal; ?></td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>