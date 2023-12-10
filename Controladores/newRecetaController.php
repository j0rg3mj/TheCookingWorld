<?php

require_once "Controller.php";
require_once "Modelos/Receta.php";
require_once "Modelos/Ingrediente.php";


class newRecetaController extends Controller {
  public function newReceta() {
    $ingredientes = Ingrediente::getAllIngredientes();
    $this-> render("newReceta.php.twig", [
      "ingredientes" => $ingredientes
    ]);
  }

  public function crearReceta() {
    if (Receta::newReceta($_POST ["name"], $_POST ["img"], $_POST ["desc"])) {
      header("Location: VolverRecetas");
    }
  }

  public function crearIngrediente() {
    if (Ingrediente::crearIngrediente($_POST ["newIngrediente"])) {
      header("Location: NuevaReceta");
    }
    
  }
}

?>