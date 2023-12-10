<?php

require_once "Controller.php";
require_once "Modelos/login.php";
require_once "Modelos/Receta.php";

  class recetaController extends Controller {
    public function volverRecetas() {
      $recetas = Receta::getAllRecetas();
        $this-> render("recetas.php.twig", [
          "recetas" => $recetas
        ]);
    }
  }