<?php
// iniciamos la sesion para poder usar variables de sesion
session_start();

// validamos que los datos hayan sido enviados por el metodo post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // obtenemos los valores enviados desde el formulario usando $_POST
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';

    // validamos que los campos no esten vacios
    if (!empty($username) && !empty($email)) {
        // guardamos algunos valores en variables de sesion
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;

        // mostramos los valores obtenidos
        echo "<h1>Datos recibidos:</h1>";
        echo "<p>Nombre de usuario: " . htmlspecialchars($username) . "</p>";
        echo "<p>Correo electronico: " . htmlspecialchars($email) . "</p>";

        // mostramos los valores almacenados en la sesion
        echo "<h2>Valores almacenados en la sesion:</h2>";
        echo "<p>Nombre de usuario (sesion): " . htmlspecialchars($_SESSION['username']) . "</p>";
        echo "<p>Correo electronico (sesion): " . htmlspecialchars($_SESSION['email']) . "</p>";
    } else {
        // mensaje de error si los campos estan vacios
        echo "<p>Error: Todos los campos son obligatorios.</p>";
    }
} else {
    // mensaje de error si se intenta acceder directamente al archivo sin enviar datos
    echo "<p>Error: Acceso no permitido.</p>";
}
?>