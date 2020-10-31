<?php
namespace models;

require_once("Conexion.php");

class TareaModel{

    public function insertar($data){ //$data es un arreglo asociativo, generado de otra parte (controlador)
        $stm = Conexion::conector()->prepare("INSERT INTO tareas VALUES(NULL,:nombre,:descripcion)");
        $stm->bindParam(":nombre",$data['nombre']);
        $stm->bindParam(":descripcion",$data['descripcion']);
        return $stm->execute();
    }

    public function TareaList(){
        $stm = Conexion::conector()->prepare("SELECT * FROM tareas");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function searchTask($id){
        $stm = Conexion::conector()->prepare("SELECT * FROM tareas WHERE id=:A");
        $stm->bindParam(":A",$id);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function deleteTask($id){
        $stm = Conexion::conector()->prepare("DELETE FROM tareas WHERE id=:A");
        $stm->bindParam(":A",$id);
        return $stm->execute();
    }
    public function updateTask($id, $data){ //$data["nombre"=>valor1,"descrip"=>jaskjd]
        $stm = Conexion::conector()->prepare("UPDATE tareas SET nombre=:A, descripcion:=:B WHERE id=:C");
        $stm->bindParam(":A",$data['nombre']);
        $stm->bindParam(":B",$data['descripcion']);
        $stm->bindParam(":C",$id);
        return $stm->execute();
    }
}