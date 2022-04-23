<?php
session_start();
include('config.php');
include_once 'class/autos.php';
if (!isset($_SESSION['autoID'])) {
    header('Location: index.php');
    exit;
}
$crud = new crud($conn);
//validacion del boton actualizar
if (isset($_POST['btn-update'])) {
    $autoID = $_GET['autoID'];
    $matricula = $_POST['matricula'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $color = $_POST['color'];
    $precio = $_POST['precio'];
    //hace referencia a la funcion update
    if ($crud->update($autoID, $matricula, $marca, $Modelo, $color, $precio)) {
        $msg = "<b>WOW, Actualizacion exitosa!</b>";
    } else {
        $msg = "<b>ERROR, algo anda mal</b>";
    }
}
if (isset($_GET['autoId'])) {
    $autoID = $_GET['autoID'];
    extract($crud->getID($autoID));
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php require_once "menu.php" ?>
    <title>USUARIOS</title>
</head>

<body>

    <div class="container"><br>
        <div class="row justify-content-center">
            <div class="col-6 p-5 bg-white shadow-lg rounded">
                <?php
                if (isset($msg)) {
                    echo $msg;
                }
                ?>
                <h3>ACTUALIZAR AUTOMOVIL</h3>
                <hr>
                <form method="post">
                    <div class="form-group">
                        <label for="usuario">automovil</label>
                        <input id="automovil" value="<?php echo $marca; ?>" class="form-control" type="text" name="automovil">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Modelo</label>
                        <input id="modelo" value="<?php echo $modelo; ?>" class="form-control" type="tex" name="modelo">
                    </div><br>
                    <button class="btn btn-primary" name="btn-update" type="submit">Actualizar</button>
                </form>
            </div>


        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>