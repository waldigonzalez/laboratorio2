<?php
include_once 'config.php';
include_once 'class/autos.php';
if (isset($_GET['delete_id'])) {
    $AutoID = $_GET['delete_id'];
    $crud = new crud($conn);
    // header("Location:eliminar_users.php");
}
echo $AutoID;
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
    <title>DELETE</title>
</head>

<body>
    <div class="container"><br>
        <?php
        if (isset($_GET['delete_autoID'])) {
        ?>
            <table class='table table-bordered'>
                <tr>
                    <th>AutoID</th>
                    <th>MATRICULA</th>
                    <th>MARCA</th>
                    <th>MODELO</th>
                    <th>COLOR</th>
                    <th>PRECIO</th>
                </tr>
                <?php
                $stmt = $conn->prepare("SELECT * FROM automovil WHERE autoID=:autoID");
                $stmt->execute(array(":autoID" => $_GET['delete_autoID']));
                while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
                ?>
                    <tr>
                        <td><?php echo ($row['autoID']); ?></td>
                        <td><?php echo ($row['matricula']); ?></td>
                        <td><?php echo ($row['marca']); ?></td>
                        <td><?php echo ($row['modelo']); ?></td>
                        <td><?php echo ($row['color']); ?></td>
                        <td><?php echo ($row['precio']); ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        <?php
        }
        ?>
    </div>
    <div class="container">
        <p>
            <?php
            if (isset($_GET['delete_autoID'])) {
            ?>
        <form method="post">
            <input type="hidden" name="autoID" value="<?php echo $row['autoID']; ?>" />
            <button class="btn btn-large btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i> &nbsp; YES</button>
            <a href="admin_autos.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; NO</a>
        </form>
    <?php
            } else {
    ?>
        <a href="admin_autos.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i>REGRESAR</a>
    <?php
            }
    ?>
    </p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>