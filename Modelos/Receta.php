<?php

require_once "librerias/Conexion.php";

class Receta {
    public int $Id_Rece;
    public string $Nom_Rece;
    public ?string $Img_Rece;
    public int $Like_Rece;
    public string $Desc_Rec;
    public int $Id_Usu;

    public function getId_Rece(): int {
        return $this->Id_Rece;
    }

    public function setId_Rece(int $Id_Rece): void {
        $this->Id_Rece = $Id_Rece;
    }

    public function getNom_Rece(): string {
        return $this->Nom_Rece;
    }

    public function setNom_Rece(string $Nom_Rece): void {
        $this->Nom_Rece = $Nom_Rece;
    }

    public function getImg_Rece(): ?string {
        return $this->Img_Rece;
    }

    public function setImg_Rece(?string $Img_Rece): void {
        $this->Img_Rece = $Img_Rece;
    }

    public function getLike_Rece(): int {
        return $this->Like_Rece;
    }

    public function setLike_Rece(int $Like_Rece): void {
        $this->Like_Rece = $Like_Rece;
    }

    public function getDesc_Rec(): string {
        return $this->Desc_Rec;
    }

    public function setDesc_Rec(string $Desc_Rec): void {
        $this->Desc_Rec = $Desc_Rec;
    }

    public function getId_Usu(): int {
        return $this->Id_Usu;
    }

    public function setId_Usu(int $Id_Usu): void {
        $this->Id_Usu = $Id_Usu;
    }

    public function __construct() {
    
    }

    public static function getAllRecetas() {
        $conexion = Conexion::getConnection();
        $sql = "SELECT * FROM Receta";
        $resultado = $conexion->query($sql);
        
        $receta = []; // Inicializar el array antes del bucle

        if ($resultado->rowCount() > 0) {
            // Iterar sobre las filas del resultado y almacenar cada receta como un objeto en el array $receta
            while ($objetoReceta = $resultado->fetchObject("Receta")) {
                $receta[] = $objetoReceta;
            }
        }

        return $receta;
    }

    public static function newReceta(string $Nom_Rece, ?string $Img_Rece, string $Desc_Rec): bool {
        $conexion = Conexion::getConnection();
        $sql = "INSERT INTO Receta (Nom_Rece, Img_Rece, Like_Rece, Desc_Rec, Id_Usu) VALUES (:nom, :img, :lik, :des, :idU)";
        $parametros = array('nom' => $Nom_Rece, 'img' => $Img_Rece, 'lik' => 0, 'des' => $Desc_Rec, 'idU' => 1);
    
        $result = $conexion->query($sql, $parametros);
    
        if ($result->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
}

?>
