<?php
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="controllers/ControlInsert.php" method="POST">
        <input type="text" name="nombre" placeholder="Nombre de la tarea">
        <br>
        <input type="text" name="desc" placeholder="Descripcion de la tarea">
        <br>
        <button>Guardar tarea</button>
    </form>
    <p>
        <?php
            session_start();
            if(isset($_SESSION['resp'])){
                echo $_SESSION['resp'];
                unset($_SESSION['resp']);
            }
        ?>
    </p>
</body>
</html>