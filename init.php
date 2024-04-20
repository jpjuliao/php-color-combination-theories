<?php
require_once 'ColorTheory.php';
require_once 'ComplementaryColorsTheory.php';

// Function to validate hex color code format
function isValidHexColor($color) {
    return preg_match('/^#[a-fA-F0-9]{6}$/', $color);
}

// Check if command-line arguments are provided
if ($argc < 3) {
    echo "Usage: php script.php <primary_color> <secondary_color>\n";
    exit(1);
}

// Retrieve command-line arguments
$primaryColor = $argv[1];
$secondaryColor = $argv[2];

// Validate color format
if (!isValidHexColor($primaryColor) || !isValidHexColor($secondaryColor)) {
    echo "Invalid color format. Please provide colors in hexadecimal format (e.g., #ff0000).\n";
    exit(1);
}

// Create instance of ComplementaryColorsTheory
$complementaryColorsTheory = new ComplementaryColorsTheory($primaryColor, $secondaryColor);

// Evaluate the color combination
$quality = $complementaryColorsTheory->evaluateCombination();
echo "Quality of complementary color combination: " . $quality . "\n";

?>
