<?php

require_once 'BaseClass.php';

// definimos una clase hija que extiende de la clase abstracta
class ChildClass extends BaseClass {
    // constructor para inicializar el mensaje
    public function __construct($message) {
        // asignamos el mensaje a la propiedad protegida
        $this->message = $message;
    }

    // implementamos el método abstracto
    public function displayMessage() {
        // mostramos el mensaje almacenado
        echo "mensaje: " . $this->message . "<br>";
    }
}
?>