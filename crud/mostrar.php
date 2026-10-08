<?php
    require_once __DIR__ . "/../config/conexion.php";
$sql = "SELECT * FROM estudiantes";
$stmt = $conexion -> prepare($sql);
$stmt-> execute();

$estudiantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>