 
            <h1>Nuevo Usuario</h1>
 


    <div class="container py-4">

        <form method="POST" enctype="multipart/form-data">

            <div class="form-group py-2">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre">
            </div>
            <div class="form-group py-2">
                <label for="email">email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="email">
            </div>
            <div class="form-group py-2">
                <label for="password">password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="password">
            </div>
            
            <div class="py-2">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>

        </form>

    </div>
</body>

</html>