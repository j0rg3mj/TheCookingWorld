<?php

require_once "librerias/Conexion.php";
require_once "Modelos/Receta.php";

class Usuario{
  public int $Id_Usu;
  public string $Nom_Usu;
  public string $email_Usu;
  public string $Contr_Usu;
  public int $Like_Usu;

  // Getter para Id_Usu
  public function getId_Usu(): int {
    return $this->Id_Usu;
  }

  // Setter para Id_Usu
  public function setId_Usu(int $Id_Usu): void {
      $this->Id_Usu = $Id_Usu;
  }

  // Getter para Nom_Usu
  public function getNom_Usu(): string {
      return $this->Nom_Usu;
  }

  // Setter para Nom_Usu
  public function setNom_Usu(string $Nom_Usu): void {
      $this->Nom_Usu = $Nom_Usu;
  }

  // Getter para email_Usu
  public function getEmail_Usu(): string {
      return $this->email_Usu;
  }

  // Setter para email_Usu
  public function setEmail_Usu(string $email_Usu): void {
      $this->email_Usu = $email_Usu;
  }

  // Getter para Contr_Usu
  public function getContr_Usu(): string {
      return $this->Contr_Usu;
  }

  // Setter para Contr_Usu
  public function setContr_Usu(string $Contr_Usu): void {
      $this->Contr_Usu = $Contr_Usu;
  }

  // Getter para Like_Usu
  public function getLike_Usu(): int {
      return $this->Like_Usu;
  }

  // Setter para Like_Usu
  public function setLike_Usu(int $Like_Usu): void {
      $this->Like_Usu = $Like_Usu;
  }

  public function __construct() {
    
  }

  public static function getUsuario(int $id) {
    $conexion = Conexion::getConnection();
    $sql = "SELECT * FROM Usuario WHERE ";
    $resultado = $conexion->query($sql);
  }

  public static function nuevoUsuario(string $email_Usu, string $Nom_Usu, string $Contr_Usu): bool {
    $conexion = Conexion::getConnection();
    $sql = "INSERT INTO Usuario (Nom_Usu, email_Usu, Contr_Usu, Like_Usu) VALUES (:nom, :ema, :con, :lik)";
    $parametros = array('nom' => $Nom_Usu, 'ema' => $email_Usu, 'lik' => 0, 'con' => $Contr_Usu);

    $result = $conexion->query($sql, $parametros);

    if ($result->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
  }
}

?>