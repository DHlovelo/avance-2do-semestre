<?php
require_once __DIR__ . "/../config/conexion.php";
$sql = "SELECT * FROM estudiantes";
$resultado = $conexion->query($sql);
$estudiantes = $resultado->fetchAll(PDO::FETCH_ASSOC); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Primer CRUD</title>
</head>
<body>
    <div>
        <h2>Registrar estudiantes</h2>
        <form action="insertar.php" method="POST">
            <div>
                <label for="nombre">Nombre del estudiante</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div>
                <label for="ci">Carnet</label>
                <input type="text" id="ci" name="ci" required>
            </div>
            <div>
                <label for="fn">Fecha de nacimiento</label>
                <input type="date" id="fn" name="fn">
            </div>
            <div>
                <label for="correo">Correo</label>
                <input type="email" id="correo" name="correo" required>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <input type="submit" id="submit" name="submit" value="Enviar">
            </div>
        </form>
    </div>

    <div>
        <h2>Lista de estudiantes</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Carnet</th>
                    <th>Fecha de nacimiento</th>
                    <th>Correo</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($estudiantes)): ?>
                    <?php foreach ($estudiantes as $estudiante): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($estudiante["nombre"]); ?></td>
                            <td><?php echo htmlspecialchars($estudiante["ci"]); ?></td>
                            <td><?php echo htmlspecialchars($estudiante["f_n"]); ?></td>
                            <td><?php echo htmlspecialchars($estudiante["correo"]); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">No hay estudiantes registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>