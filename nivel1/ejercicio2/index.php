<?php
/*Haz un programa que utilice al menos un par de constantes mágicas. * 
 */


 define("EJERCICIO2", "Ejercicio 2");
 echo "<h1>" . EJERCICIO2 . "</h1>";

// incluimos los archivos de las clases
require_once 'ChildClass.php';

// definimos una constante para el nombre del script actual usando una constante mágica
define('SCRIPT_NAME', __FILE__);

// mostramos el nombre del script actual
echo "nombre del script actual: " . SCRIPT_NAME . "<br>";

// mostramos la línea actual del código usando otra constante mágica
echo "esta linea de codigo se encuentra en la linea: " . __LINE__ . "<br>";

// obtenemos un valor de una variable superglobal ($_GET) con validacion
if (isset($_GET['name'])) {
    // almacenamos el valor del parámetro 'name' en una variable
    $userName = htmlspecialchars($_GET['name']); // usamos htmlspecialchars para evitar inyecciones de codigo
    echo "hola, " . $userName . "!<br>";
} else {
    // mostramos un mensaje si el parámetro 'name' no está presente
    echo "no se proporciono ningun nombre en la url.<br>";
}

// creamos una instancia de la clase hija
$instance1 = new ChildClass("este es el primer mensaje");

// llamamos al método para mostrar el mensaje
$instance1->displayMessage();

// mostramos información del objeto usando el método mágico __toString
echo $instance1;

// creamos otra instancia de la clase hija
$instance2 = new ChildClass("este es el segundo mensaje");

// llamamos al método para mostrar el mensaje
$instance2->displayMessage();

// mostramos información del segundo objeto usando el método mágico __toString
echo $instance2;
?>
