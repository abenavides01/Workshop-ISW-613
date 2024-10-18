<?php
$temperatures = [78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73];

/**
 * @var mixed
 * saca el promedio de la las temperaturas
 * array_sum = suma todos los valores del array
 */
$avarageTemp = array_sum($temperatures)/count($temperatures);
echo "La temperatura promedio es: " . round($avarageTemp, 1) . "\n";

/**
 * @var mixed
 * elimina los duplicados y ordena el array
 * array_unique = elimina los valores duplicados del array
 * sort() = ordena los valores de manera ascendente
 */
$uniqueTemps = array_unique($temperatures);
sort($uniqueTemps);

/**
 * @var mixed
 * saca las 5 temperaturas más bajas
 * array_slice = obtiene los primeros 5 valores del array
 * implode = convierte un array en cadena de texto
 */
$lowestTemps = array_slice($uniqueTemps, 0, 5);
echo "Top 5 temperaturas más bajas: " . implode(", ", $lowestTemps) . "\n";

/**
 * @var mixed
 * saca las 5 temperaturas más altas
 */
$highestTemps = array_slice($uniqueTemps, -5);
echo "Top 5 temperaturas más altas: " . implode(", ", $highestTemps) . "\n";