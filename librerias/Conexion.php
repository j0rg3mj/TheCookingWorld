<?php

class Conexion
{

  private static ?Conexion $instancia = null;
  private $pdo; // conexión con el servidor de bases de datos

  private $resultado;

  private function __clone()
  {
  }

  /**
   * Conectamos con el servidor de bases de datos únicamente
   * cuando creo la instancia de la clase Conexión.
   */
  private function __construct()
  {

    try {
      // establecer una conexión con el servidor de bases de datos indicando:
      // - La dirección del servidor (db porque estamos trabajando con un servicio de docker)
      // - Usuario
      // - Contraseña
      // - Nombre de la base de datos (opcional)
      // - Puerto (opcional)
      $this->pdo = new PDO("mysql:host=db;dbname=The_Cooking_World", "root", "");


      // Podemos comprobar si se ha producido un error
      //if ($sqli->connect_errno)
      //	die("** Error de conexión con la base de datos: {$sqli->connect_error}<br/>") ;

      // seleccionar la base de datos con la que vamos a trabajar (USE en SQL)
      // $sqli->select_db("series") ;
    } catch (mysqli_sql_exception $exp) {
      die("** Error de conexión con la base de datos: " . $exp->getMessage() . "<br/>");
    }
  }

  /**
   * Crea una única instancia de la clase Conexión, la guarda y
   * devuelve.
   * @return Conexion
   */
  public static function getConnection(): Conexion
  {

    if (self::$instancia == null)
      self::$instancia = new Conexion;
    return self::$instancia;
  }

  /**
   * Realiza una consulta sobre la base de datos y guarda
   * el conjunto de resultados en una propiedad de la clase
   */
  public function query(string $sql, ?array $bindValue = [])
  {
    $sqlp = $this->pdo->prepare($sql);

    foreach ($bindValue as $key => $value) {
      $sqlp->bindValue("$key", $value);
    }

    if ($sqlp->execute()) {
      return $sqlp;
    } else {
      die("** Error en la consulta: " . $sqlp->errorInfo()[2]);
    }
  }
}