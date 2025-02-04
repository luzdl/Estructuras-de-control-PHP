<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="estructurasControl.php" method="get">
        Introduce un número para generar la serie Fibonacci: 
        <input type="number" name="numFibo" min="1" required>
        <input type="submit" value="Generar">
    </form>

    <br>

    <?php
        function fibonacci(){
            if (!isset($_GET["numFibo"]) || $_GET["numFibo"] < 1) {
                echo "Por favor ingresa un número válido.";
                return;
            }

            $n = intval($_GET["numFibo"]);
            $fibo = [0, 1];

            for ($i = 2; $i < $n; $i++) {
                $fibo[] = $fibo[$i - 1] + $fibo[$i - 2];
            }

            echo "Los primeros $n términos de Fibonacci son: " . implode(", ", $fibo);
        }

        if (isset($_GET["numFibo"])) {
            fibonacci();
        }
    ?>

    <br>

    <form action="estructurasControl.php" method="get">
        Introduce un número para saber si es primo o no: <input type="text" name="esPrimo">
        <input type="submit">
    </form>

    <br>

    <?php
    function esPrimo() {
        // Verificamos si el número fue enviado por GET y lo convertimos a entero
        if (!isset($_GET["esPrimo"]) || !is_numeric($_GET["esPrimo"])) {
            echo "Por favor, ingrese un número válido.";
            return;
        }

        $numero = intval($_GET["esPrimo"]); // Convertir a entero

        if ($numero < 2) {
            echo "El número no es primo";
            return;
        }

        $esPrimo = true; // Asumimos que es primo

        for ($i = 2; $i <= sqrt($numero); $i++) { // Solo verificamos hasta la raíz cuadrada
            if ($numero % $i == 0) {
                $esPrimo = false;
                break; // Si encontramos un divisor, salimos del bucle
            }
        }

        echo $esPrimo ? "El número es primo" : "El número no es primo";
    }

    // Llamamos a la función solo si se envió el número por GET
    if (isset($_GET["esPrimo"])) {
        esPrimo();
    }
    
    ?>

    <br>

    <form action="estructurasControl.php" method="get">
        Introduce una palabra o frase para saber si es un palíndromo: 
        <input type="text" name="palindromo" required>
        <input type="submit" value="Verificar">
    </form>

    <br>

    <?php
        function esPalindromo(){
            if (!isset($_GET["palindromo"])) {
                echo "Por favor ingresa una palabra o frase.";
                return;
            }

            $input = strtolower(str_replace(' ', '', $_GET["palindromo"]));
            $reversedInput = strrev($input);

            if ($input === $reversedInput) {
                echo "Es un palíndromo.";
            } else {
                echo "No es un palíndromo.";
            }
        }

        if (isset($_GET["palindromo"])) {
            esPalindromo();
        }
    ?>

    <br>

    <form action="estructurasControl.php" method="get">
        Introduce una lista de números separados por comas: 
        <input type="text" name="numerosPares" required>
        <input type="submit" value="Sumar">
    </form>

    <br>

    <?php
        function sumaNumerosPares(){
            if (!isset($_GET["numerosPares"])) {
                echo "Por favor ingresa una lista de números.";
                return;
            }

            $numeros = explode(",", $_GET["numerosPares"]);
            $suma = 0;

            foreach ($numeros as $num) {
                if (is_numeric(trim($num)) && intval($num) % 2 == 0) {
                    $suma += intval($num);
                }
            }

            echo "La suma de los números pares es: $suma";
        }

        if (isset($_GET["numerosPares"])) {
            sumaNumerosPares();
        }
    ?>

    <br>

    <form action="estructurasControl.php" method="get">
        Introduce una cadena de texto: 
        <input type="text" name="frecuenciaTexto" required>
        <input type="submit" value="Analizar">
    </form>

    <br>

    <?php
        function frecuenciaCaracteres(){
            if (!isset($_GET["frecuenciaTexto"])) {
                echo "Por favor ingresa una cadena de texto.";
                return;
            }

            $texto = str_replace(' ', '', strtolower($_GET["frecuenciaTexto"]));
            $frecuencia = array_count_values(str_split($texto));

            echo "Frecuencia de caracteres:<br>";
            foreach ($frecuencia as $char => $count) {
                echo "$char: $count<br>";
            }
        }

        if (isset($_GET["frecuenciaTexto"])) {
            frecuenciaCaracteres();
        }
    ?>

    <br>

    <form action="estructurasControl.php" method="get">
        Introduce el número de filas para la pirámide: 
        <input type="number" name="numFilas" min="1" required>
        <input type="submit" value="Generar">
    </form>

    <br>

    <?php
        function piramideAsteriscos(){
            if (!isset($_GET["numFilas"])) {
                echo "Por favor ingresa un número de filas.";
                return;
            }

            $n = intval($_GET["numFilas"]);

            for ($i = 1; $i <= $n; $i++) {
                echo str_repeat("&nbsp;", ($n - $i) * 2);
                echo str_repeat("* ", $i) . "<br>";
            }
        }

        if (isset($_GET["numFilas"])) {
            piramideAsteriscos();
        }
    ?>

</body>
</html>