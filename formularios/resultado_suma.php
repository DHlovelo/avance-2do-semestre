<?php
if(_server["request_method"] !== "post"){
    exit("enviar form");   
}
$numero1 = $_POST["n1"];
$numero2 = $_POST["n2"];
$resultado = $numero1 + $numero2;
echo "el resultado es: " , $resultado;