<?php
require_once 'ColorTheory.php';

/**
 * Class AnalogousColorsTheory
 * 
 * A class for evaluating the color combination based on Analogous Colors theory.
 */
class AnalogousColorsTheory extends ColorTheory
{
  /**
   * Evaluate the quality of the color combination based on Analogous Colors theory.
   * 
   * @return float A value between 0 and 1 representing the quality of the combination.
   */
  public function evaluateCombination()
  {
    // Convert primary and secondary colors to RGB format
    $primaryRgb = $this->hexToRgb($this->primaryColor);
    $secondaryRgb = $this->hexToRgb($this->secondaryColor);

    // Calculate color difference (Euclidean distance)
    $colorDifference = sqrt(
      pow($primaryRgb['r'] - $secondaryRgb['r'], 2) +
        pow($primaryRgb['g'] - $secondaryRgb['g'], 2) +
        pow($primaryRgb['b'] - $secondaryRgb['b'], 2)
    );

    // Normalize color difference to a value between 0 and 1
    $maxColorDifference = sqrt(pow(255, 2) * 3); // Maximum possible difference
    $normalizedDifference = $colorDifference / $maxColorDifference;

    // Invert the normalized difference to represent quality (closer to 0 is better)
    $quality = 1 - $normalizedDifference;

    return max(0, min(1, $quality)); // Ensure quality is between 0 and 1
  }
}
