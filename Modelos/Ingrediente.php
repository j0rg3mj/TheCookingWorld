<?php

require_once "librerias/Conexion.php";

class Ingrediente {
  public int $Id_Ingre;
  public string $Nom_Ingre;

  // Getter para Id_Ingre
  public function getIdIngre(): int {
    return $this->Id_Ingre;
  }

  // Setter para Id_Ingre
  public function setIdIngre(int $Id_Ingre): void {
      $this->Id_Ingre = $Id_Ingre;
  }

  // Getter para Nom_Ingre
  public function getNomIngre(): string {
      return $this->Nom_Ingre;
  }

  // Setter para Nom_Ingre
  public function setNomIngre(string $Nom_Ingre): void {
      $this->Nom_Ingre = $Nom_Ingre;
  }

  public static function crearIngrediente(string $Nom_Ingre) {
    $conexion = Conexion::getConnection();
    $sql = "INSERT INTO Ingrediente (Nom_Ingre) VALUES (:nom)";
    $parametros = array('nom' => $Nom_Ingre);

    $result = $conexion->query($sql, $parametros);

    if ($result->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}

  public static function getAllIngredientes() {
    $conexion = Conexion::getConnection();
    $sql = "SELECT * FROM Ingrediente";
    $resultado = $conexion->query($sql);
    
    $ingrediente = []; // Inicializar el array antes del bucle

    if ($resultado->rowCount() > 0) {
        // Iterar sobre las filas del resultado y almacenar cada receta como un objeto en el array $receta
        while ($objetoIngrediente = $resultado->fetchObject("Ingrediente")) {
            $ingrediente[] = $objetoIngrediente;
        }
    }

    return $ingrediente;
  }

}

?>