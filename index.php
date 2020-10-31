<?php
    //INSTRUCCIONES PARA MOSTRAR POSIBLES ERRORES PHP
use models\TareaModel as TareaModel;

ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);
    require_once("models/TareaModel.php");//IMPORTANDO LA TAREA MODEL
    
    $model = new TareaModel();
    $tareas = $model->TareaList();
    print_r($tareas);
    $prueba = $model->searchTask(2);
    print_r($prueba);

    $model->deleteTask(2);
    $model->updateTask(3,['nombre'=>'Tarea #3','descripcion'=>'Estudiar Materialize']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col l4 m4 s12">
                <h4 class="center">Nueva Tarea</h4>
                <form action="controllers/ControlInsert.php" method="POST">
                    <div class="input-field">
                        <input id="nombre" type="text" name="nombre">
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="input-field">
                        <input id="descripcion" type="text" name="desc">
                        <label for="descripcion">Descripcion</label>
                    </div>
                    <button class="btn">Guardar tarea</button>
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
            </div>
            <div class="col l8 m8 s12">
                <h4 class="center">Listado de Tareas</h4>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Tarea</th>
                        <th>Descripcion</th>
                    </tr>
                    <?php foreach ($tareas as $item) { ?>
                        <tr>
                            <td><?=$item["id"]?></td>
                            <td><?=$item["nombre"]?></td>
                            <td><?=$item["descripcion"]?></td>
                            <td>
                                <button class="btn">Editar</button>
                                <button class="btn">Eliminar</button>
                            </td>
                        </tr>    
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>