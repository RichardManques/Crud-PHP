<?php

namespace controllers;

use models\TareaModel as TareaModel;

require_once("../models/TareaModel.php");

class ControlTabla{
    public $bt_edit;
    public $bt_delete;

    public function __construct()
    {
        $this->bt_edit = $_POST['bt_edit'];
        $this->bt_delete = $_POST['bt_delete'];
    }
    public function procesar(){
            
        if(isset($this->bt_edit)){
            //echo "editar el ID $this->bt_edit";
            session_start();
            $_SESSION['editar']="editar";
            $modelo = new TareaModel();
            $tarea = $modelo->searchTask($this->bt_edit);
            header("Location:../index.php");
            $_SESSION['tarea']=$tarea[0];
        }else{
            echo "eliminar el ID $this->bt_delete";
            $modelo = new TareaModel();
            $modelo->deleteTask($this->bt_delete);
            header("Location:../index.php");
        }
    }
}

$obj = new ControlTabla();
$obj->procesar();