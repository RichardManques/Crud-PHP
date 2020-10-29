<?php
namespace controllers;

require_once("../models/TareaModel.php");

use models\TareaModel as TareaModel; //siempre que cuando llamemos a una clase de otra carpeta, se coloca un alias (as) 

class ControlInsert{
    public $nombre;
    public $descrip;

    public function __construct()
    {
        $this->nombre = $_POST['nombre'];
        $this->descrip = $_POST['desc'];
    }
    public function guardarTarea(){
        session_start();
        if($this->nombre=="" || $this->descrip==""){
            $_SESSION['resp'] = "Campos vacios";
            header('Location:../index.php');
            return;
        }
        $model = new TareaModel();

        $data = ["nombre"=>$this->nombre,"descripcion"=>$this->descrip];

        $count = $model->insertar($data);

        if($count==1){
            $_SESSION['resp']="Tarea creada!";
        }else{
            $_SESSION['resp']="Hubo un error en la base de datos";
        }
        header('Location:../index.php');
    }
}

$obj = new ControlInsert();//llamar siempre al controlador
$obj->guardarTarea();