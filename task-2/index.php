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

// Output HTML and CSS for the grid
echo '<html>';
echo '<head>';
echo '<style>';
echo 'pre { font-family: monospace; font-size: 20px; }';
echo '</style>';
echo '</head>';
echo '<body>';
echo '<pre>';

// Display the grid
foreach ($grid as $row) {
    if (is_string($row)) {
        foreach (str_split($row) as $char) {
            echo htmlspecialchars($char);
        }
    }
    echo PHP_EOL;
}

echo '</pre>';
echo '</body>';
echo '</html>';

// Output the list of probable coordinate points
echo "\nProbable item locations:" . PHP_EOL;
foreach ($probableLocations as $location) {
    echo "({$location[0]}, {$location[1]})" . PHP_EOL;
}

// Output the actual hidden item location
echo "<br>";
echo "\nHidden item location: ({$hiddenItemX}, {$hiddenItemY})" . PHP_EOL;

// Button for restart the game
echo "<br>";
echo "<br>";
echo "<button onClick='window.location.reload();'>Refresh the game</button>";
