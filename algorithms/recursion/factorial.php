<?php

function factorial($n)
{
    if ($n >= 0) {
        return $n != 0 ? $n * factorial($n - 1) : 1;
    } return 0;
}

print_r("!5 = " . factorial(5) . "\n"); //=> 120
print_r("!4 = " . factorial(4) . "\n"); //=> 24
print_r("!0 = " . factorial(0) . "\n"); //=> 1
print_r("!(-4) = " . factorial(-4) . "\n"); //=> 0
