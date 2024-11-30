<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $total_vueltas = $_POST['total_vueltas'];
    $tiempo_A = $_POST['tiempo_A'];
    $tiempo_B = $_POST['tiempo_B'];

  
    function mcm($a, $b) {
        return abs($a * $b) / gcd($a, $b);
    }

    function gcd($a, $b) {
        while ($b != 0) {
            $temp = $b;
            $b = $a % $b;
            $a = $temp;
        }
        return $a;
    }

 
    $tiempo_comun = mcm($tiempo_A, $tiempo_B);
    
    $vueltas_A = $tiempo_comun / $tiempo_A;
    $vueltas_B = $tiempo_comun / $tiempo_B;


    echo "<h2>Resultados:</h2>";
    echo "<p>Ambos corredores coinciden en el punto de salida después de " . $tiempo_comun . " minutos.</p>";
    echo "<p>Corredor A ha dado " . $vueltas_A . " vueltas.</p>";
    echo "<p>Corredor B ha dado " . $vueltas_B . " vueltas.</p>";

    echo "<h3>Vueltas dadas por cada corredor:</h3>";
    for ($i = 1; $i <= $total_vueltas; $i++) {
        $tiempo_vuelta_A = $tiempo_A * $i;
        $tiempo_vuelta_B = $tiempo_B * $i;
        
        echo "<p>Vuelta $i: Corredor A - $tiempo_vuelta_A minutos, Corredor B - $tiempo_vuelta_B minutos</p>";
    }
}
?>
