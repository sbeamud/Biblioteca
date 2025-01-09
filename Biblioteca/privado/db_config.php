<?php
// Configurar conexion a la base de datos
$host = 'localhost';
$nombreBD = 'biblioteca';
$usuario = 'root';
$password = '';

/*  
// --> PRUEBA DE CONEXION CON mysqli <--
$conexion = new mysqli($host, $usuario, $password, $nombreBD);

if ($conexion->connect_errno) {
    echo "Conexion fallida" . $conexion->connect_errno;
} else {
    echo "Conectado";
}
*/

try {
    // Crear conexion a la base de datos con manejo de errores
    $pdo = new PDO("mysql:host=$host;dbname=$nombreBD;charset=utf8", $usuario, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
}

?>
