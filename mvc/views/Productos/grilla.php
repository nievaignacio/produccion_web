<?php if(isset($resultados)){

echo "<h1>".$resultados."</h1>";
}
?>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">

    <?php
    foreach ($productos as $producto) {
    ?>
        <div class="col">
            <div class="card">
                <img src="<?= BASE_URL ?>/public/uploads/<?= $producto->imagen; ?>"  class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title "><?php echo $producto->nombre; ?></h5>
                    <p class="card-text"><?php echo $producto->descripcion; ?></p>
                    <a href="<?= BASE_URL ?>/productos/detalle/<?php echo $producto->id; ?>" class="stretched-link">$<?php echo $producto->precio; ?></a>
                </div>
            </div>

        </div>
    <?php
    }

    ?>

</div>