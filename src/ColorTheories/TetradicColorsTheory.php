<?php

require_once 'ColorTheory.php';

/**
 * Class TetradicColorsTheory
 * 
 * A class for evaluating the color combination based on Tetradic (Double Complementary) Colors theory.
 */
class TetradicColorsTheory extends ColorTheory
{
  /**
   * Evaluate the quality of the color combination based on Tetradic (Double Complementary) Colors theory.
   * 
   * @return float A value between 0 and 1 representing the quality of the combination.
   */
  public function evaluateCombination()
  {
    // Convert primary color to RGB format
    $primaryRgb = $this->hexToRgb($this->primaryColor);

    // Calculate complementary color
    $complementaryRgb = [
      'r' => 255 - $primaryRgb['r'],
      'g' => 255 - $primaryRgb['g'],
      'b' => 255 - $primaryRgb['b']
    ];

    // Calculate tetradic colors (±60° and ±180°)
    $tetradic1Rgb = [
      'r' => $primaryRgb['r'] + 60,
      'g' => $primaryRgb['g'],
      'b' => $primaryRgb['b']
    ];
    $tetradic2Rgb = [
      'r' => $primaryRgb['r'] - 60,
      'g' => $primaryRgb['g'],
      'b' => $primaryRgb['b']
    ];
    $tetradic3Rgb = [
      'r' => $primaryRgb['r'] + 180,
      'g' => $primaryRgb['g'],
      'b' => $primaryRgb['b']
    ];

    // Normalize RGB values to ensure they are within 0-255 range
    foreach ([$tetradic1Rgb, $tetradic2Rgb, $tetradic3Rgb] as &$color) {
      $color['r'] = max(0, min(255, $color['r']));
      $color['g'] = max(0, min(255, $color['g']));
      $color['b'] = max(0, min(255, $color['b']));
    }
    unset($color); // Unset reference

    // Calculate color differences between primary and tetradic colors
    $colorDifference1 = $this->calculateColorDifference($primaryRgb, $tetradic1Rgb);
    $colorDifference2 = $this->calculateColorDifference($primaryRgb, $tetradic2Rgb);
    $colorDifference3 = $this->calculateColorDifference($primaryRgb, $tetradic3Rgb);

    // Normalize color differences to values between 0 and 1
    $normalizedDifference1 = $colorDifference1 / 255; // Maximum color difference is 255
    $normalizedDifference2 = $colorDifference2 / 255; // Maximum color difference is 255
    $normalizedDifference3 = $colorDifference3 / 255; // Maximum color difference is 255

    // Calculate average normalized difference
    $averageDifference = ($normalizedDifference1 + $normalizedDifference2 + $normalizedDifference3) / 3;

    // Calculate quality based on average normalized difference (closer to 0 is better)
    $quality = 1 - $averageDifference;

    return max(0, min(1, $quality)); // Ensure quality is between 0 and 1
  }
}
