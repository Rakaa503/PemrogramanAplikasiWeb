<?php

$i = 1;
$putaran = 0;

while ($i <= 10) {
    $putaran++;

    echo "Putaran $putaran: i = $i<br>";

    if ($i % 2 === 0) {
        echo "-> $i genap, CONTINUE<br>";

        if ($putaran >= 5) {
            echo "-> Dihentikan untuk pembuktian.<br>";
            break;
        }

        continue;
    }

    if ($i > 7) {
        break;
    }

    echo "-> Output: $i<br>";

    $i++;
}