
<?php
function calcular_mcm($a, $b) {
    return ($a * $b) / calcular_gcd($a, $b);
}

function calcular_gcd($a, $b) {
    while ($b != 0) {
        $t = $b;
        $b = $a % $b;
        $a = $t;
    }
    return $a;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vueltas_totales = intval($_POST["vueltas"]);
    $tiempo_a = intval($_POST["tiempo_a"]);
    $tiempo_b = intval($_POST["tiempo_b"]);

    if ($tiempo_a <= 0 || $tiempo_b <= 0 || $vueltas_totales <= 0) {
        echo "<p>Los valores deben ser mayores que cero.</p>";
        exit;
    }

    // Calcular el MCM de los tiempos
    $mcm = calcular_mcm($tiempo_a, $tiempo_b);
    
    // Calcular cuántas vueltas da cada corredor para coincidir en el punto de salida
    $vueltas_a = $mcm / $tiempo_a;
    $vueltas_b = $mcm / $tiempo_b;

    echo "<h2>Resultados:</h2>";
    echo "<p>Los corredores coinciden después de " . $mcm . " minutos.</p>";
    echo "<p>El Corredor A dará " . $vueltas_a . " vueltas y el Corredor B dará " . $vueltas_b . " vueltas para coincidir nuevamente en el punto de salida.</p>";

    // Mostrar las vueltas por cada corredor
    echo "<h3>Vueltas del Corredor A:</h3>";
    for ($i = 1; $i <= $vueltas_a; $i++) {
        echo "<p>Vuelta $i: " . ($i * $tiempo_a) . " minutos.</p>";
    }

    echo "<h3>Vueltas del Corredor B:</h3>";
    for ($i = 1; $i <= $vueltas_b; $i++) {
        echo "<p>Vuelta $i: " . ($i * $tiempo_b) . " minutos.</p>";
    }
}
?>