<?php
require_once '/src/ColorTheories/ComplementaryColorsTheory.php';
require_once '/src/ColorTheories/AnalogousColorsTheory.php';
require_once '/src/ColorTheories/SplitComplementaryColorsTheory.php';
require_once '/src/ColorTheories/TetradicColorsTheory.php';

// ===========================================================

// Function to validate hex color code format
function isValidHexColor($color)
{
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

// ===========================================================

// Create instance of ComplementaryColorsTheory
$complementaryColorsTheory = new ComplementaryColorsTheory(
  "Complementary Color Theory",
  $primaryColor,
  $secondaryColor
);

// Evaluate the color combinations
$theoryName = $complementaryColorsTheory->theoryName;
$quality = $complementaryColorsTheory->evaluateCombination();
echo "Combination Quality based on $theoryName: $quality\n";

// ===========================================================

// Create instance of AnalogousColorsTheory
$AnalogousColorsTheory = new AnalogousColorsTheory(
  "Analogous Colors Theory",
  $primaryColor,
  $secondaryColor
);

// Evaluate the color combinations
$theoryName = $AnalogousColorsTheory->theoryName;
$quality = $AnalogousColorsTheory->evaluateCombination();
echo "Combination Quality based on $theoryName: $quality\n";

// ===========================================================

// Create instance of SplitComplementaryColorsTheory
$SplitComplementaryColorsTheory = new SplitComplementaryColorsTheory(
  "Split-Complementary Colors Theory",
  $primaryColor,
  $secondaryColor
);

// Evaluate the color combinations
$theoryName = $SplitComplementaryColorsTheory->theoryName;
$quality = $SplitComplementaryColorsTheory->evaluateCombination();
echo "Combination Quality based on $theoryName: $quality\n";

// ===========================================================

// Create instance of TetradicColorsTheory
$TetradicColorsTheory = new TetradicColorsTheory(
  "Tetradic Colors Theory",
  $primaryColor,
  $secondaryColor
);

// Evaluate the color combinations
$theoryName = $TetradicColorsTheory->theoryName;
$quality = $TetradicColorsTheory->evaluateCombination();
echo "Combination Quality based on $theoryName: $quality\n";
