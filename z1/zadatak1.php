<?php

function getClosestNumbers($options, $number): array
{

    $left = 0;
    $right = count($options) - 1;
    $found = false;

    while ($left <= $right) {

        $mid = $left + floor(($right - $left) / 2);

        if ($options[$mid] === $number) {
            $found = true;
            break;
        } else if ($options[$mid] < $number) {
            $left = $mid + 1;
        } else {
            $right = $mid - 1;
        }
    }

    if ($found === true) {
        $closestNumbers = [$number];
    } else {
        $closestNumbers = [$options[$left], $options[$right]];
    }


    return $closestNumbers;
}


$options = [-908, -852, -475, -355, -102, -100, -55, -25, -18, -7, -6, -5, 0, 1, 7, 8, 99, 101, 122, 147, 5025, 5334, 7410];

$number = 90;
$closestNumbers = getClosestNumbers($options, $number);
echo "Najbliži brojevi broja $number su: ";
echo implode(",", $closestNumbers);

$number = 101;
$closestNumbers = getClosestNumbers($options, $number);
echo " \n Najbliži brojevi broja $number su: ";
echo implode(",", $closestNumbers);
