<div class="row">
    <div class="col-6">

        <img src="<?php

                    echo BASE_URL ?>/public/uploads/<?= $producto->imagen; ?>" class="card-img-top" alt="...">
    </div>

    <div class="col-6">

        <h1><?php echo $producto->nombre; ?></h1>
        <p><?php echo $producto->descripcion; ?></p>
        <h2>$<?php echo $producto->precio; ?></h2>




            <?php if (isset($itemCompra)) {  ?>

            

                <p>Stock disponible: <?php echo $producto->stock + $itemCompra->cantidad; ?></p>
                
                <form action="<?php echo BASE_URL ?>/carrito/editar" method="POST">

                <p>Este producto ya esta en tu carrito.</p>
                <div class="row">
                    <div class="col-6">
                        <input type="number" name="cantidad" class="form-control" min=1 max=<?= $producto->stock + $itemCompra->cantidad; ?> value="<?= $itemCompra->cantidad; ?>">
                        <input type="hidden" name="id" value="<?php echo $producto->id ?>">
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary">Actualizar cantidad</button>
                        <!-- <a href="<?php echo BASE_URL ?>/carrito/agregar/<?php echo $producto->id ?>/1" class="btn btn-primary">Agregar al Carrito</a> -->
                    </div>

                <?php  } else if ($producto->stock > 0) { ?>

                    <p>Stock disponible: <?php echo $producto->stock; ?></p>
                
                    <form action="<?php echo BASE_URL ?>/carrito/agregar/" method="POST">

                    <div class="row">
                        <div class="col-6">
                            <input type="number" name="cantidad" class="form-control" min=1 max=<?= $producto->stock; ?> value="1">
                            <input type="hidden" name="id" value="<?php echo $producto->id ?>">
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary">Agregar al Carrito</button>
                            <!-- <a href="<?php echo BASE_URL ?>/carrito/agregar/<?php echo $producto->id ?>/1" class="btn btn-primary">Agregar al Carrito</a> -->
                        </div>


                    <?php  } else { ?>

                        <p>Producto Sin Stock</p>

                    <?php } ?>
        </form>

    </div>

</div>
</div>