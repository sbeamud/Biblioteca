<?php 
include '../privado/db_config.php';

// Insertar libros
$addUsuarios = $pdo->prepare("INSERT INTO usuarios (nombre, email) VALUES (?, ?)");

// Libros para insertar
$usuarios = [
    ["Fredi Mercurio", "fredi@queen.com"],
    ["Brian May", "brian@queen.com"],
    ["Roger Tylor", "roger@queen.com"]
]; 

// Pasar por cada libro y si esta su columna vacia hace la insercion
foreach ($usuarios as $usu) {
    $verificarUsuario = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE nombre = ?");
    $verificarUsuario->execute([$usu[0]]);
    
    if ($verificarLibro->fetchColumn() == 0) {
        $addUsuarios->execute($usu);
        echo "Usuario '{$usu[0]}' añadido correctamente.<br>";
    } else {
        echo "El usuario '{$usu[0]}' ya existe en la base de datos.<br>";
    }
}

?>