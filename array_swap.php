<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 07.07.2017
 * Time: 16:18
 */
require_once __DIR__ . '/lib/Debug.php';

function array_swap(&$array, $num) {
    list($array[0],$array[$num]) = array($array[$num],$array[0]);
}

function sortWithSwap ($array = array()) {
    $count = count($array);
    $returnArray = [];
    for ($j = 0; $j < $count; $j++) {
        for ($i = count($array) - 1; $i > 0; $i--) {
            if ($array[$i] < $array[0]) {
                array_swap($array, $i);
            }
        }
        $returnArray[] = $array[0];
        array_splice($array, 0, 1);
    }

    return $returnArray;
}

$arr = [4, 5, 8, 9, 1, 7, 2];
$arr2 = [3, 6, 2];

echo '<h2>До array_swap</h2>';
\lib\Debug::prn($arr2);
array_swap($arr2, 2);
echo '<h2>После array_swap</h2>';
\lib\Debug::prn($arr2);

echo '<br>';
echo '<h2>До сортировки</h2>';
\lib\Debug::prn($arr);
$arr = sortWithSwap($arr);
echo '<h2>После сортировки</h2>';
\lib\Debug::prn($arr);