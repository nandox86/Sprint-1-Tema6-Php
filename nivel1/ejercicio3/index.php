<?php
/*Sobreescribe alguna de las lógicas de entre todos los métodos mágicos existentes (que no sea __construct)
*/
declare(strict_types=1);


define("EJERCICIO3", "Ejercicio 3");
 echo "<h1>" . EJERCICIO3 . "</h1>";
// incluir la clase User
require_once 'Usuario.php';

try {
    // crear un nuevo usuario
    $user = new User("Nando", "Arias");

    // establecer edad usando el metodo magico __set
    $user->age = 40;

    // mostrar informacion usando diferentes metodos
    echo "Usando getters normales:<br>";
    echo "Nombre: " . $user->getName() . "<br>";
    echo "Apellido: " . $user->getSurname() . "<br>";
    echo "Edad: " . $user->getAge() . "<br>";

    echo "<br>Usando metodo magico __get:<br>";
    echo "Edad: " . $user->age . "<br>";

    echo "<br>Usando metodo magico __toString:<br>";
    echo $user . "<br>";

    echo "<br>Usando getFullInfo:<br>";
    echo $user->getFullInfo() . "<br>";

    // probar validaciones
    echo "<br>Probando validaciones:<br>";
    
    // intentar establecer una edad invalida
    try {
        $user->age = 150;  // esto deberia fallar
    } catch (InvalidArgumentException $e) {
        echo "Error al establecer edad: " . $e->getMessage() . "<br>";
    }

    // intentar crear un usuario con nombre vacio
    try {
        $invalidUser = new User("", "Smith");
    } catch (InvalidArgumentException $e) {
        echo "Error al crear usuario: " . $e->getMessage() . "<br>";
    }

} catch (Exception $e) {
    echo "Error general: " . $e->getMessage();
}
?>