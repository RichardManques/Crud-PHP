<?php
    //INSTRUCCIONES PARA MOSTRAR POSIBLES ERRORES PHP
use models\TareaModel as TareaModel;

ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);
    require_once("models/TareaModel.php");//IMPORTANDO LA TAREA MODEL
    
    $model = new TareaModel();
    $tareas = $model->TareaList();
    //print_r($tareas);
    $prueba = $model->searchTask(7);
    print_r($prueba);

    session_start();
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

                <?php if(!isset($_SESSION['editar'])) { ?>
                <!--AGREGAR TAREA-->
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
                        if(isset($_SESSION['resp'])){
                            echo $_SESSION['resp'];
                            unset($_SESSION['resp']);
                        }
                    ?>
                </p>
                <!--FIN AGREGAR TAREA-->
                <?php }else { ?>
                <!--EDITAR TAREA-->
                <h4 class="center">Editar Tarea</h4>
                    <form action="controllers/ControlEdit.php" method="POST">
                        <input type="hidden" name="id" value="<?=$_SESSION['tarea']['id']?>">
                        <div class="input-field">
                            <input id="nombre" type="text" name="nombre" value="<?=$_SESSION['tarea']['nombre']?>">
                            <label for="nombre">Nombre</label>
                        </div>

                        <div class="input-field">
                            <input id="descripcion" type="text" name="desc" value="<?=$_SESSION['tarea']['descripcion']?>">
                            <label for="descripcion">Descripcion</label>
                        </div>
                        <button class="btn orange">Editar tarea</button>
                    </form>
                <!--FIN EDITAR TAREA-->
                <?php
                    unset( $_SESSION['editar']);
                    unset($_SESSION['tarea']);
                    } 
                ?>    

            </div>      
            <div class="col l8 m8 s12">
                <h4 class="center">Listado de Tareas</h4>
                <form action="controllers/ControlTabla.php" method="POST">
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
                                <button name="bt_edit" value="<?=$item["id"]?>" class="btn">Editar</button>
                                <button name="bt_delete" value="<?=$item["id"]?>"class="btn">Eliminar</button>
                            </td>
                        </tr>    
                    <?php } ?>
                </table>
                </form>
            </div>


        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>