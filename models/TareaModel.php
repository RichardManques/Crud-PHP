<?php
namespace models;

require_once("Conexion.php");

class TareaModel{

    public function insertar($data){ //$data es un arreglo asociativo, generado de otra parte (controlador)
        $stm = Conexion::conector()->prepare("INSERT INTO TAREAS VALUES(NULL,:nombre,:descripcion)");
        $stm->bindParam(":nombre",$data['nombre']);
        $stm->bindParam(":descripcion",$data['descripcion']);
        return $stm->execute();
    }

}