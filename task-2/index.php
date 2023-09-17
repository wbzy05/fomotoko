<?php

// Define the grid layout
$grid = [
    "########",
    "#......#",
    "#.###..#",
    "#...#.##",
    "#X#....#",
    "########"
];

// Define the player's starting position
$startX = 4;
$startY = 1;

// Define the navigation steps
$steps = [
    ["Up", 2],
    ["Right", 2],
    ["Down", 2]
];

// Generate a list of probable item locations
$probableLocations = [];

foreach ($steps as $step) {
    list($direction, $distance) = $step;
    if ($direction == "Up") {
        for ($i = 1; $i <= $distance; $i++) {
            $probableLocations[] = [$startX - $i, $startY];
        }
    } elseif ($direction == "Right") {
        for ($i = 1; $i <= $distance; $i++) {
            $probableLocations[] = [$startX, $startY + $i];
        }
    } elseif ($direction == "Down") {
        for ($i = 1; $i <= $distance; $i++) {
            $probableLocations[] = [$startX + $i, $startY];
        }
    }
}

// Shuffle the probable locations
shuffle($probableLocations);

// Select a random location as the hidden item
$hiddenItemLocation = array_shift($probableLocations);

// Update the grid with the hidden item
$hiddenItemX = $hiddenItemLocation[0];
$hiddenItemY = $hiddenItemLocation[1];
$grid[$hiddenItemX][$hiddenItemY] = '$';
