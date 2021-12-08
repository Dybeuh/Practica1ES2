<?php include_once('frutas.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Mi Tienda - Inicio</title>
</head>
<body>
    <div class="container">
        <h1 class="py-5">
            Productos disponibles
            <svg class="bi" width="40" height="40" fill="currentColor">
                <use xlink:href="bootstrap-icons.svg#shop"/>
            </svg>
        </h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">Selecciona la opción deseada:</h5>

                <form class="form-inline" method="post" action="carrito.php">
                    <div class="form-group mx-sm-3">
                        <label for="producto">Producto:</label>
                        <select id="producto" name="producto" class="form-control">
                        <?php foreach ($listaFrutas as $fruta => $precio): ?>
                            <option value="<?php echo $fruta; ?>">
                                <?php echo $fruta; ?> (<?php echo $precio; ?> €/kg)
                            </option>
                        <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group mx-sm-3">
                        <label for="cantidad">Cantidad:</label> <!-- con el for sirve para que el label apunte a un input -->
                        <input id="cantidad" type="number" name="cantidad" class="form-control" value="0">
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>