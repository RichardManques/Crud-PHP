<?php
namespace controllers;

use models\TareaModel as TareaModel;

require_once("../models/TareaModel.php");
class ControlEdit{
    public $id;
    public $nombre;
    public $descripcion;

    public function __construct()
    {
        $this->id = $_POST['id'];
        $this->nombre = $_POST['nombre'];
        $this->descripcion = $_POST['desc'];
    }

    public function editar(){
        ini_set('display_errors',1);
        ini_set('display_startup_errors',1);
        error_reporting(E_ALL);
        if($this->nombre=="" || $this->descripcion==""){
            $_SESSION['erroredit']="Los campos están vacíos";
            header("Location:../index.php");
            return;
        }
        $data = ['nombre'=>$this->nombre,'descripcion'=>$this->descripcion];
        $modelo = new TareaModel();
        $count = $modelo->updateTask($this->id, $data);

        if($count==1){
            $_SESSION['okedit']="Tarea Actualizada";
        }else{
            $_SESSION['erroredit']="Error en la base de datos";
        }
        header("Location:../index.php");
    }
}

$obj = new ControlEdit();
$obj->editar();