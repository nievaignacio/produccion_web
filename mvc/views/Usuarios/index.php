<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Usuarios</title>
</head>

<body>

    <div class="container">

        <h1>Lista de Usuarios</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>usuario</th>
                    <th>email</th>
                </tr>
            </thead>

            <tbody>

                <?php
                foreach ($usuarios as $usuario) {
                ?>
                    <tr>
                        <td><?php echo $usuario->id; ?></td>
                        <td><?php echo $usuario->name; ?></td>
                        <td><?php echo $usuario->email; ?></td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>

    </div>
</body>

</html>