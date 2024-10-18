<?php
$ceu = array(
    "Italia" => "Roma", 
    "Luxemburgo" => "Luxemburgo", 
    "Bélgica" => "Bruselas", 
    "Dinamarca" => "Copenhague", 
    "Finlandia" => "Helsinki", 
    "Francia" => "París", 
    "Eslovaquia" => "Bratislava", 
    "Eslovenia" => "Liubliana", 
    "Alemania" => "Berlín", 
    "Grecia" => "Atenas", 
    "Irlanda" => "Dublín", 
    "Países Bajos" => "Ámsterdam", 
    "Portugal" => "Lisboa", 
    "España" => "Madrid", 
    "Suecia" => "Estocolmo", 
    "Reino Unido" => "Londres", 
    "Chipre" => "Nicosia", 
    "Lituania" => "Vilna", 
    "República Checa" => "Praga", 
    "Estonia" => "Tallin", 
    "Hungría" => "Budapest", 
    "Letonia" => "Riga", 
    "Malta" => "La Valeta", 
    "Austria" => "Viena", 
    "Polonia" => "Varsovia"
);

// Ordenar el array por nombre de país (claves)
ksort($ceu);

// Recorrer el array ordenado e imprimir el país y su capital
foreach ($ceu as $pais => $capital) {
    echo "La capital de $pais es $capital.\n";
}
