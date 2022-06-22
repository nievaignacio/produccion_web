<style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
</style>


<!-- Custom styles for this template -->
<link href="form-validation.css" rel="stylesheet">


<h2>Finalizar compra</h2>

<br>

<div class="row g-5">
  <div class="col-md-5 col-lg-4 order-md-last">
    <h4 class="d-flex justify-content-between align-items-center mb-3">
      <span class="text-primary">Tu compra</span>
      <!-- <span class="badge bg-primary rounded-pill">3</span> -->
    </h4>
    <!-- <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Product name</h6>
              <small class="text-muted">Brief description</small>
            </div>
            <span class="text-muted">$12</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Second product</h6>
              <small class="text-muted">Brief description</small>
            </div>
            <span class="text-muted">$8</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Third item</h6>
              <small class="text-muted">Brief description</small>
            </div>
            <span class="text-muted">$5</span>
          </li>
          <li class="list-group-item d-flex justify-content-between bg-light">
            <div class="text-success">
              <h6 class="my-0">Promo code</h6>
              <small>EXAMPLECODE</small>
            </div>
            <span class="text-success">−$5</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (USD)</span>
            <strong>$20</strong>
          </li>
        </ul> -->
    <!-- 
        <form class="card p-2">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Promo code">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </form> -->


    <p>Subtotal de la compra= $<?= $total; ?> <br>
      IVA (+<?= 100 * IVA; ?>%) = $<?= $total * IVA; ?> <br>

      <strong> Total a pagar= $<?= $total  + $total * IVA; ?> </strong>
    </p>


  </div>



  <?php

                             
  if (isset($usuario)) {
  ?>

    <div class="col-md-7 col-lg-8">


    <h4 class="mb-3">Datos del Usuario</h4>

<p><?= $usuario->nombre;?></p>
<p><?= $usuario->email;?></p>

      <h4 class="mb-3">Datos para el envio</h4>
      <form class="needs-validation" novalidate method="POST">
        <div class="row g-3">
          <div class="col-sm-6">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>

          <div class="col-sm-6">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>

     

          <div class="col-12">
            <label for="telefono" class="form-label">Telefono </label>
            <input type="telefono" class="form-control" id="telefono" name="telefono" placeholder="you@example.com">
            <div class="invalid-feedback">
              Please enter a valid telefono address for shipping updates.
            </div>
          </div>



          <div class="col-12">
            <label for="direccion" class="form-label">Direccion</label>
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="1234 Main St" required>
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>

          <!-- <div class="col-12">
              <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
            </div> -->

          <div class="col-md-5">
            <label for="provincia" class="form-label">Provincia</label>
            <select class="form-select" id="provincia" name="provincia" required>
              <option>CABA</option>
            </select>
            <div class="invalid-feedback">
              Por favor seleccione la provincia
            </div>
          </div>

          <!-- <div class="col-md-4">
              <label for="state" class="form-label">State</label>
              <select class="form-select" id="state" required>
                <option value="">Choose...</option>
                <option>California</option>
              </select>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div> -->

          <div class="col-md-3">
            <label for="codigoPostal" class="form-label">Codigo Postal</label>
            <input type="text" class="form-control" id="codigoPostal" name="codigoPostal" placeholder="" required>
            <div class="invalid-feedback">
              Zip code required.
            </div>
          </div>
        </div>
        <!-- 
          <hr class="my-4">

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="same-address">
            <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>
          </div>

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="save-info">
            <label class="form-check-label" for="save-info">Save this information for next time</label>
          </div>

          <hr class="my-4">

          <h4 class="mb-3">Payment</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
              <label class="form-check-label" for="credit">Credit card</label>
            </div>
            <div class="form-check">
              <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="debit">Debit card</label>
            </div>
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="paypal">PayPal</label>
            </div>
          </div>

          <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-name" class="form-label">Name on card</label>
              <input type="text" class="form-control" id="cc-name" placeholder="" required>
              <small class="text-muted">Full name as displayed on card</small>
              <div class="invalid-feedback">
                Name on card is required
              </div>
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">Credit card number</label>
              <input type="text" class="form-control" id="cc-number" placeholder="" required>
              <div class="invalid-feedback">
                Credit card number is required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-expiration" class="form-label">Expiration</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
              <div class="invalid-feedback">
                Expiration date required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-cvv" class="form-label">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
              <div class="invalid-feedback">
                Security code required
              </div>
            </div>
          </div> -->

        <hr class="my-4">

        <button class="w-100 btn btn-primary btn-lg" type="submit">Realizar pedido</button>
      </form>
    </div>
</div>



<?php
  } else {
?>



  <div class="col-md-7 col-lg-8">
    <p>Por favor inicia sesion o registrate para finalizar tu compra.</p>

    <?php //  require_once("../.."BASE_DIR."/views/Usuarios/login.php");?>

    <form action="<?= BASE_URL ?>/usuarios/login" method="POST">

      <div class="form-floating">
        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" >
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>

      <!-- <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>-->
    
      <br>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>


    </form>
 

    <hr>
    <!-- <h4>No tenes cuenta? Registrate aqui</h4>
     -->

<a href="<?=BASE_URL?>/usuarios/registro" class="w-100 btn btn-lg btn-primary">Registrarme</a>


  </div>


<?php
  }
?>