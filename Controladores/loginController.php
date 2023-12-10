<?php

require_once "Controller.php";
require_once "Modelos/login.php";
require_once "Modelos/Receta.php";

  class loginController extends Controller {
    public function comprobarLogin() {
      $recetas = Receta::getAllRecetas();
      if (login::comprobar($_POST ["email"], $_POST ["password"])) {
        $this-> render("recetas.php.twig", [
          "recetas" => $recetas
        ]);
      } else {
        echo "Correo o contraseña invalida.";
      }
    }

    public function volverLogin() {
      $this-> render("login.php.twig");
    }
  }
?>