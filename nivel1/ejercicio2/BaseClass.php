<?php

abstract class BaseClass {
    // propiedad protegida para almacenar un mensaje
    protected $message;

    // método abstracto que debe ser implementado por las clases hijas
    abstract public function displayMessage();

    // método mágico __toString para convertir el objeto en una cadena
    public function __toString() {
        return "este objeto pertenece a la clase: " . get_class($this) . "<br>";
    }
}
?>