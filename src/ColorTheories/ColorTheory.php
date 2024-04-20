<?php

/**
 * Abstract class ColorTheory
 * 
 * Abstract class for color theory with primary and secondary colors.
 */
abstract class ColorTheory
{
  /**
   * @var string The name of the color theory.
   */
  public $theoryName;

  /**
   * @var string The primary color in hexadecimal format.
   */
  protected $primaryColor;

  /**
   * @var string The secondary color in hexadecimal format.
   */
  protected $secondaryColor;

  /**
   * ColorTheory constructor.
   * 
   * @param string $primaryColor The primary color in hexadecimal format.
   * @param string $secondaryColor The secondary color in hexadecimal format.
   */
  public function __construct($theoryName, $primaryColor, $secondaryColor)
  {
    $this->theoryName = $theoryName;
    $this->primaryColor = $primaryColor;
    $this->secondaryColor = $secondaryColor;
  }

  /**
   * Get the primary color.
   * 
   * @return string The primary color in hexadecimal format.
   */
  public function getPrimaryColor()
  {
    return $this->primaryColor;
  }

  /**
   * Get the secondary color.
   * 
   * @return string The secondary color in hexadecimal format.
   */
  public function getSecondaryColor()
  {
    return $this->secondaryColor;
  }

  /**
   * Set the primary color.
   * 
   * @param string $primaryColor The primary color in hexadecimal format.
   */
  public function setPrimaryColor($primaryColor)
  {
    $this->primaryColor = $primaryColor;
  }

  /**
   * Set the secondary color.
   * 
   * @param string $secondaryColor The secondary color in hexadecimal format.
   */
  public function setSecondaryColor($secondaryColor)
  {
    $this->secondaryColor = $secondaryColor;
  }

  /**
   * Convert hexadecimal color to RGB array.
   * 
   * @param string $hexColor The hexadecimal color code.
   * @return array An associative array containing RGB values.
   */
  protected function hexToRgb($hexColor)
  {
    // Remove '#' from the beginning of the hex color code
    $hexColor = ltrim($hexColor, '#');

    // Convert hex to RGB (red, green, blue) format
    $rgb = [
      'r' => hexdec(substr($hexColor, 0, 2)),
      'g' => hexdec(substr($hexColor, 2, 2)),
      'b' => hexdec(substr($hexColor, 4, 2))
    ];

    return $rgb;
  }

  /**
   * Calculate the color difference between two RGB colors.
   * 
   * @param array $color1 The RGB values of the first color.
   * @param array $color2 The RGB values of the second color.
   * @return float The color difference.
   */
  protected function calculateColorDifference($color1, $color2)
  {
    return sqrt(
      pow($color1['r'] - $color2['r'], 2) +
        pow($color1['g'] - $color2['g'], 2) +
        pow($color1['b'] - $color2['b'], 2)
    );
  }

  /**
   * Abstract method to evaluate color combination.
   * 
   * @return float A value between 0 and 1 representing the quality of the combination.
   */
  abstract public function evaluateCombination();
}
