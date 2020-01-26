<?php

$statesNeeded = ["mt", "wa", "or", "id", "nv", "ut", "ca", "az"];
$stations = [];
$stations["kone"] = ["id", "nv", "ut"];
$stations["ktwo"] = ["wa", "id", "mt"];
$stations["kthree"] = ["or", "nv", "ca"];
$stations["kfour"] = ["nv", "ut"];
$stations["kfive"] = ["ca", "az"];
$finalStations = [];

while (!empty($statesNeeded)) {
    $bestStation = null;
    $statesCovered = [];
    foreach (array_keys($stations) as $name) {
        $states = $stations[$name];
        $covered = array_intersect($statesNeeded, $states);
        if (count($covered) > count($statesCovered)) {
            $bestStation = $name;
            $statesCovered = $covered;
        }
    }
    $statesNeeded = array_diff($statesNeeded, $statesCovered);
    $finalStations[] = $bestStation;
}

print_r($finalStations);
