<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
</head>
<body>
    <h1>Bienvenid@ a La Biblioteca Básica.</h1>
    <h2>Humilde Stock de Libros:</h2>  
    
    <?php
    include '../privado/db_config.php';
    try {
        // Preparar la consulta para listar libros
        $listarLibros = $pdo->prepare("SELECT * FROM libros");
        $listarLibros->execute();

        // El resultado de la consulta se almacena como array asociativo
        $libros = $listarLibros->fetchAll(PDO::FETCH_ASSOC);

        echo "<table border='1'>";
        echo "<tr><th>Título</th><th>Autor</th><th>Disponible</th></tr>";

        // Mostrar el resultado de la consulta
        foreach ($libros as $libro) {
            $disponible = $libro['disponible'] == 1 ? "Sí" : "No";
            echo "<tr>
                    <td>" . htmlspecialchars($libro['titulo']) . "</td>
                    <td>" . htmlspecialchars($libro['autor']) . "</td>
                    <td>" . htmlspecialchars($disponible) . "</td>
                </tr>";
        }

        echo "</table>";

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
    }
    ?>

    <h2>Nuestros socios:</h2>  
    
    <?php
    try {
        // Preparar la consulta para listar libros
        $listarUsuarios = $pdo->prepare("SELECT * FROM usuarios");
        $listarUsuarios->execute();

        // El resultado de la consulta se almacena como array asociativo
        $usuarios = $listarUsuarios->fetchAll(PDO::FETCH_ASSOC);

        echo "<table border='1'>";
        echo "<tr><th>Nombre</th><th>Email</th></tr>";
       
        // Mostrar el resultado de la consulta
        foreach ($usuarios as $usu) {
            echo "<tr>
                    <td>" . htmlspecialchars($usu['nombre']) . "</td>
                    <td>" . htmlspecialchars($usu['email']) . "</td>
                </tr>";
        }

        echo "</table>";

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
    }
    ?>

</body>
</html>