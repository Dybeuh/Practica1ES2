<?php
session_start();
include_once('frutas.php');

if (isset($_POST['producto']) && isset($_POST['cantidad'])) {
    //if(isset($_POST){
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];

    // Validar formulario y añadir ítem a sesión
    if (is_numeric($cantidad) && $cantidad > 0) {
        if (!isset($_SESSION['items'])) {
            $_SESSION['items'] = [];
        }
        // la nueva cantidad es la suma de cantidad + la cantidad que ya hubiese para ese producto o 0 como valor por defecto.
        $nuevaCantidad = $cantidad + ($_SESSION['items'][$producto] ?? 0);
        //nueva cantidad se establece a la suma de cantidad + $_SESSION['items'][$producto] si tiene valor, si no 0
        $_SESSION['items'][$producto] = $nuevaCantidad;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Mi Tienda - Carrito</title>
</head>
<body>
    <div class="container">
        <h1 class="py-5">
            Carrito de la compra
            <svg class="bi" width="40" height="40" fill="currentColor">
                <use xlink:href="bootstrap-icons.svg#cart4"/>
            </svg>
        </h1>

        <div class="card">
            <div class="card-body">
                <?php if(isset($_SESSION['items'])): ?>
                    <h5 class="card-title">El carrito tiene los siguientes productos:</h5>
                    <ul class="mb-4">
                    <?php $total = 0; ?>
                    <?php foreach($_SESSION['items'] as $fruta => $cantidad): ?>
                        <?php      // precio de las fruta por cantidad
                        $precio = $listaFrutas[$fruta] * $cantidad;  
                        $total += $precio;
                        ?>
                        <li>
                            <span><?php echo $fruta; ?></span>
                            <span>x<?php echo $cantidad; ?><span>
                            <span>(<?php echo $precio; ?>€)<span>
                        </li>
                    <?php endforeach ?>
                    </ul>
                    <h5>Total: <strong><?php echo $total; ?>€</strong></h5>
                <?php else: ?>
                    <h5 class="card-title">El carrito está vacío</h5>
                <?php endif ?>
                <a href="inicio.php" class="card-link">Seguir comprando</a>
                <a href="pedidos.php" class="card-link">Procesar pedido</a>
            </div>
        </div>
    </div>
</body>
</html>