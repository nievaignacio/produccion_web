
<a href="<?php echo BASE_URL; ?>/carrito/vaciar" class="btn btn-primary position-relative float-end">
Vaciar Carrito </a>

<h2>Carrito de compras</h2>


        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th>producto</th>
                    <th>imagen</th>
                    <th>nombre</th>
                    <th>descripcion</th>
                    <th>precio unitario</th>
                    <th>cantidad</th>
                    <th>subtotal</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>

                <?php
                foreach ($productos as $key => $producto) {
                ?>
                    <tr>
                        <td><?php echo $producto->producto->id; ?></td>
                        <td><a href="./productos/detalle/<?php echo $key; ?>"> <img src="<?php echo BASE_URL?>/public/uploads/<?php echo $producto->producto->imagen; ?>" width="50"></a></td>
                        <td><?php echo $producto->producto->nombre; ?></td>
                        <td><?php echo $producto->producto->descripcion; ?></td>
                        <td>$<?php echo $producto->producto->precio; ?></td>
                        <td><?php echo $producto->cantidad; ?></td>
                        <td>$<?php echo $producto->producto->precio * $producto->cantidad;  ?></td>
                        <td>
                        <a href="./productos/detalle/<?php echo $key; ?>" class="btn btn-primary">Editar </a>
                            <a href="./carrito/eliminar/<?php echo $key; ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>

        <div class="bg-light p-2 ">

    <p>Subtotal de la compra= $<?=$total; ?> <br>    
    <a href="./checkout" class="btn btn-primary float-end">Finalizar Compra</a>

    IVA (+<?=100 * IVA; ?>%) = $<?=$total * IVA;?>   <br>    
    
    <strong> Total a pagar= $<?=$total  + $total * IVA; ?> </strong></p> 
    
    </div>   

    <br>