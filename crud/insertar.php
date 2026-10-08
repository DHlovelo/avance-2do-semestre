<?php
require_once __DIR__ . "/../config/conexion.php";
if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    exit("enviar el formulario");
}
$nombre = $_POST["nombre"];
$carnet = $_POST["ci"];
$f_n =$_POST["fn"];
$correo = $_POST["correo"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);    
$sql = "INSERT INTO estudiantes(nombre, f_n, ci, correo, password)
VALUES(:nombre, :f_n, :ci,:correo, :password)";
$stmt = $conexion->prepare($sql);
$stmt->execute([
    ":nombre" => $nombre,
    ":f_n" => $f_n,
    ":ci" => $carnet,
    ":correo" => $correo,
    ":password" => $password
]);
header("location: index.php");
?>