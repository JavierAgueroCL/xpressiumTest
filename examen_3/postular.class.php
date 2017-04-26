<?php
require_once ("db_remota.php");
class postular extends db {

  public function obtener_ubicacion($tabla, $identificador, $padre) {
    if(empty($padre)) { $where = ""; } else { $where = "WHERE padre=$padre"; }
    $this->query = "SELECT * FROM ".$tabla." $where ORDER BY ".$identificador." DESC";
    $this->select($this->query);
    array_pop($this->rows);
    return $this->rows;
  }

  public function nueva_postulacion($nombre, $email, $mensaje) {
      if($this->comprobar_email($email) == "Error") {
          return array("Error", "El email ya esta registrado");
      }
      else {
        $this->query = "INSERT INTO postulaciones
        (email, nombre, descripcion, fecha_postulacion) VALUES
        ('".$this->sanitizar($email)."',
        '".$this->sanitizar($nombre)."',
        '".$this->sanitizar($mensaje)."',
        CURDATE())
        ";
        $this->ejecutar_consulta($this->query);
        return array($this->error, $this->mensaje);
      }
  }

  public function comprobar_email($email) {
    $this->query = "SELECT * FROM postulaciones WHERE email='".$this->sanitizar($email)."'";
    $this->select($this->query);
    array_pop($this->rows);
    if(count($this->rows) >= 1){
      return "Error";
    }
    else {
      return "Exito";
    }
  }

  public function obtener_postulaciones() {
    $this->query = "SELECT * FROM postulaciones order by id desc";
    $this->select($this->query);
    //array_pop($this->rows);
    return $this->rows;
  }
}
?>
