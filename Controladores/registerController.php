<?php

require_once "Controller.php";
require_once "Modelos/Usuario.php";
require_once "Modelos/login.php";
require_once "Modelos/Receta.php";

class registerController extends Controller {
  public function newUser() {
    if (Usuario::nuevoUsuario($_POST ["email"],$_POST ["username"],$_POST ["password"])) {
      header("Location: Login");
    }
  }

  public function volverRegister() {
    $this-> render("register.php.twig");
  }
}

?>