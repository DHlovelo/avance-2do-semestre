<?php
$resultado = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $a = isset($_POST['a']) ? trim($_POST['a']) : '';
    $b = isset($_POST['b']) ? trim($_POST['b']) : '';
    $operacion = isset($_POST['operacion']) ? trim($_POST['operacion']) : '';

    if (!is_numeric($a) || !is_numeric($b)) {
        $error = "Por favor, ingresa valores numéricos válidos para A y B.";
    } else {
        $numA = (float)$a;
        $numB = (float)$b;

        switch ($operacion) {
            case 'sumar':
            case '+':
                $resultado = $numA + $numB;
                $simbolo = '+';
                break;

            case 'restar':
            case '-':
                $resultado = $numA - $numB;
                $simbolo = '-';
                break;

            case 'multiplicar':
            case '*':
                $resultado = $numA * $numB;
                $simbolo = '*';
                break;

            case 'dividir':
            case '/':

                if ($numB == 0) {
                    $error = "Error: No se puede dividir entre cero (0).";
                } else {
                    $resultado = $numA / $numB;
                    $simbolo = '/';
                }
                break;

            default:
                $error = "Error: Operación no permitida o inválida.";
                break;
        }
    }
} else {
    $error = "Acceso directo denegado. Envía el formulario desde index.html.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de la Calculadora</title>
  
</head>
<body>

    <div class="card">
        <h2>Resultado</h2>

        <?php if ($error !== null): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php elseif ($resultado !== null): ?>
            <div class="exito">
                <p><strong>Operación:</strong> <?= $numA ?> <?= $simbolo ?> <?= $numB ?></p>
                <p><strong>Resultado:</strong> <?= $resultado ?></p>
            </div>
        <?php endif; ?>

        <a href="index.html" class="btn-volver">&larr; Volver a calcular</a>
    </div>

</body>
</html>