<h2>Stock</h2>
<br>
<div class="row">
    <div class="col-sm-6">

        <div class="card text-white bg-primary mb-3">
            <!-- <div class="card-header">Header</div> -->
            <div class="card-body">
                <h5 class="card-title"><?= $enStock; ?></h5>
                <p class="card-text">Productos en Stock</p>
            </div>
        </div>
    </div>

    <div class="col-sm-6">

    <div class="card text-white bg-danger mb-3">
        <!-- <div class="card-header">Header</div> -->
        <div class="card-body">
            <h5 class="card-title"><?= $sinStock; ?></h5>
            <p class="card-text">Productos sin Stock</p>
        </div>
    </div>
</div>
</div>