<?php

require_once "librerias/Conexion.php";

Class login {
  public string $correo;
  public string $contraseña;

  public function __construct() {
    
  }

  public static function comprobar (string $cor, string $con): bool {
    $conexion = Conexion::getConnection();
    $sql = "SELECT * FROM Usuario WHERE email_Usu = :email AND Contr_Usu = :contra";
    $parametros = array("email" => $cor, "contra" => $con);
    $result = $conexion ->query($sql,$parametros);

    if ($result -> rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }
}