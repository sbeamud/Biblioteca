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

    // Crear instruccion para almacenar libros evitando inyecciones SQL
    $addLibros = $pdo->prepare("INSERT INTO libros (titulo, autor) VALUES (?, ?)");

    // Ejecutar instruccion para almacenar libros
    $addLibros->execute(["Don Quijote de la Mancha", "Miguel de Cervantes"]);
    $addLibros->execute(["El lado oscuro", "Tricia Barr"]);
    $addLibros->execute(["Activa tus mitocondrias", "Antonio Valenzuela"]);

    echo "Libros almacenados correctamente";

    // Crear instruccion para almacenar usuarios evitando inyecciones SQL
    $addUsuarios = $pdo->prepare("INSERT INTO usuarios (nombre, email) VALUES (?, ?)");
    
    // Ejecutar instruccion para almacenar usuarios
    $addUsuarios->execute(["Fredi Mercurio", "fredi@queen.com"]);
    $addUsuarios->execute(["Brian May", "brian@queen.com"]);
    $addUsuarios->execute(["Roger Tylor", "roger@queen.com"]);

    echo "Usuarios almacenados correctamente";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}



?>