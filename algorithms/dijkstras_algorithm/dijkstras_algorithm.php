<?php

$graph = [];
$graph["start"] = [];
$graph["start"]["a"] = 6;
$graph["start"]["b"] = 2;
$graph["a"] = [];
$graph["a"]["fin"] = 1;
$graph["b"] = [];
$graph["b"]["a"] = 3;
$graph["b"]["fin"] = 5;
$graph["fin"] = [];

// the costs table
$infinity = PHP_INT_MAX;
$costs = [];
$costs["a"] = 6;
$costs["b"] = 2;
$costs["fin"] = $infinity;

// the parents table
$parents = [];
$parents["a"] = "start";
$parents["b"] = "start";
$parents["fin"] = null;
$processed = [];

function findLowestCodeNode(array $costs) {
    $lowestCost = PHP_INT_MAX;
    $lowestCostNode = null;
    global $processed;
    # Go through each node.
    foreach ($costs as $node => $cost) {
        # If it's the lowest cost so far and hasn't been processed yet...
        if ($cost < $lowestCost && !array_key_exists($node, $processed)) {
            # ... set it as the new lowest-cost node.
            $lowestCost = $cost;
            $lowestCostNode = $node;
        }
    }
    return $lowestCostNode;
}

$node = findLowestCodeNode($costs);

while ($node) {
    $cost = $costs[$node];
    $neighbors = $graph[$node];
    foreach (array_keys($neighbors) as $n) {
        print_r("start node $node \n");
        $newCost = $cost + $neighbors[$n];
        if ($costs[$n] > $newCost) {
            print_r("checked neibor $n; initial cost = $costs[$n], newcost = $newCost\n");
            $costs[$n] = $newCost;
            $parents[$n] = $node;
            print_r("parent of '$n' become node '$parents[$n]' with newcost $costs[$n] \n");
        }
    }
    $processed[$node] = true;
    $node = findLowestCodeNode($costs);
    print_r("\n node $node \n \n");
}

print("Cost from the start to each node: \n");
print_r($costs);
print("New Parents: \n");
print_r(array_flip($parents));
