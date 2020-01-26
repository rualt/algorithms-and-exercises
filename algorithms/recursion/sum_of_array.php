<?php

function sum(array $arr) : int
{
    return count($arr) != 0 ? array_splice($arr, 0, 1)[0] + sum($arr) : 0;
}

echo(sum([1, 2, 3, 4, 5,]));
echo("\n");