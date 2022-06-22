<?php

namespace Templates;


class Layout
{

    public function __construct()
    {
?>
        <!-- Content-->
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <link href="<?= BASE_URL ?>/public/styles.css" rel="stylesheet">
            <title>Mi tienda</title>
        </head>

        <body>


        <header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="<?= BASE_URL;?>" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <h1>Mi tienda</h1>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
          <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
          <li><a href="#" class="nav-link px-2 text-white">About</a></li>
        </ul>

        <div class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
        
        <?php
                           (new \controllers\ProductosController)->buscador();
                            ?>
                            </div>

        <div class="text-end">
       <!-- /   <a href="<?=BASE_URL?>/admin" class="btn btn-outline-light me-2">Login</button> -->
          <?php
                            (new \controllers\UsuariosController)->boton();
                            (new \controllers\CarritoController)->boton();
                            ?>

        </div>
      </div>
    </div>
  </header>


<!--   
            <div class="p-4 text-white bg-dark">
                <div class="container">

                    <div class="row">

                        <div class="col-3">

                            <h1> <a href="<?php echo BASE_URL; ?>">Mi tienda</a> </h1>

                        </div>

                        <div class="col-7">

                            <?php
                           (new \controllers\ProductosController)->buscador();
                            ?>
                        </div>


                        <div class="col-2">


                            <?php
                            (new \controllers\CarritoController)->boton();
                            ?>


                        </div>

                    </div>
                </div>
            </div> -->


            <div class="container py-4" id="content">





            <?php
        }

        public function __destruct()
        {
            ?>

            </div>



            <footer class="bg-light text-center">

                <!-- Copyright -->
                <div class="text-center p-3">
                    Produccion Web 2022
                </div>
                <!-- Copyright -->
            </footer>


        </body>

        </html>
<?php
        }
    }

?>