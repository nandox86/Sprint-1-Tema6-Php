<?php
/*Sobreescribe alguna de las lógicas de entre todos los métodos mágicos existentes (que no sea __construct)
*/
declare(strict_types=1);

echo PHP_EOL . PHP_EOL;

define("EJERCICIO3", "Ejercicio 3");
 echo "<h1>" . EJERCICIO3 . "</h1>". PHP_EOL;
// incluir la clase User
require_once 'Usuario.php';
echo PHP_EOL;

try {
    // crear un nuevo usuario
    $user = new User("Nando", "Arias");
    echo PHP_EOL;

    // establecer edad usando el metodo magico __set
    $user->age = 40;
    echo PHP_EOL;

    // mostrar informacion usando diferentes metodos
    echo "Usando getters normales:<br>". PHP_EOL;
    echo "Nombre: " . $user->getName() . "<br>". PHP_EOL;
    echo "Apellido: " . $user->getSurname() . "<br>". PHP_EOL;
    echo "Edad: " . $user->getAge() . "<br>". PHP_EOL;

    echo "<br>Usando metodo magico __get:<br>". PHP_EOL;
    echo "Edad: " . $user->age . "<br>". PHP_EOL;

    echo "<br>Usando metodo magico __toString:<br>". PHP_EOL;
    echo $user . "<br>". PHP_EOL;

    echo "<br>Usando getFullInfo:<br>". PHP_EOL;
    echo $user->getFullInfo() . "<br>". PHP_EOL;

    // probar validaciones
    echo "<br>Probando validaciones:<br>". PHP_EOL;
    
    // intentar establecer una edad invalida
    try {
        $user->age = 150;  // esto deberia fallar
    } catch (InvalidArgumentException $e) {
        echo "Error al establecer edad: " . $e->getMessage() . "<br>". PHP_EOL;
    }

    // intentar crear un usuario con nombre vacio
    try {
        $invalidUser = new User("", "Smith");
    } catch (InvalidArgumentException $e) {
        echo "Error al crear usuario: " . $e->getMessage() . "<br>". PHP_EOL;
    }

} catch (Exception $e) {
    echo "Error general: " . $e->getMessage();
}
echo PHP_EOL;
?>