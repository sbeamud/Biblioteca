<?php 
include '../privado/db_config.php';

// Insertar libros
$addLibros = $pdo->prepare("INSERT INTO libros (titulo, autor) VALUES (?, ?)");

// Libros para insertar
$libros = [
    ["Don Quijote de la Mancha", "Miguel de Cervantes"],
    ["El lado oscuro", "Tricia Barr"],
    ["Activa tus mitocondrias", "Antonio Valenzuela"]
]; 

foreach ($libros as $libro) {
    // Verificar si el libro ya existe
    $verificarLibro = $pdo->prepare("SELECT COUNT(*) FROM libros WHERE titulo = ?");
    $verificarLibro->execute([$libro[0]]);
    
    if ($verificarLibro->fetchColumn() == 0) {
        $addLibros->execute($libro);
        echo "Libro '{$libro[0]}' añadido correctamente.<br>";
    } else {
        echo "El libro '{$libro[0]}' ya existe en la base de datos.<br>";
    }
}
?>