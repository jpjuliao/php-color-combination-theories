<?php

/**
 * Class ColorCombinationGenerator
 * 
 * A class for generating various color combinations based on a base color.
 */
class ColorCombinationGenerator
{
  /**
   * @var string The base color in hexadecimal format.
   */
  private $baseColor;

  /**
   * ColorCombinationGenerator constructor.
   * 
   * @param string $baseColor The base color in hexadecimal format.
   */
  public function __construct($baseColor)
  {
    $this->baseColor = $baseColor;
  }

  /**
   * Convert hexadecimal color to RGB array.
   * 
   * @param string $hexColor The hexadecimal color code.
   * @return array An array containing RGB values.
   */
  private function toRgb($hexColor)
  {
    return sscanf($hexColor, "#%02x%02x%02x");
  }

  /**
   * Convert RGB array to hexadecimal color.
   * 
   * @param array $rgbArray An array containing RGB values.
   * @return string The hexadecimal color code.
   */
  private function toHex($rgbArray)
  {
    return sprintf("#%02x%02x%02x", $rgbArray[0], $rgbArray[1], $rgbArray[2]);
  }

  /**
   * Generate complementary colors.
   * 
   * @return array An array containing the base color and its complementary color.
   */
  public function comp()
  {
    $baseColorRGB = $this->toRgb($this->baseColor);
    $complementaryRGB = array_map(function ($value) {
      return 255 - $value;
    }, $baseColorRGB);
    $complementaryColor = $this->toHex($complementaryRGB);
    return array($this->baseColor, $complementaryColor);
  }

  /**
   * Generate analogous colors.
   * 
   * @return array An array containing the base color and two analogous colors.
   */
  public function analog()
  {
    $baseColorRGB = $this->toRgb($this->baseColor);
    $analogous1RGB = [$baseColorRGB[0], $baseColorRGB[1] + 30, $baseColorRGB[2]];
    $analogous2RGB = [$baseColorRGB[0], $baseColorRGB[1] - 30, $baseColorRGB[2]];
    $analogousColors = array_map(function ($rgb) {
      return $this->toHex($rgb);
    }, [$baseColorRGB, $analogous1RGB, $analogous2RGB]);
    return $analogousColors;
  }

  /**
   * Generate monochromatic colors.
   * 
   * @return array An array containing the base color, a lighter shade, and a darker shade.
   */
  public function mono()
  {
    $baseColorRGB = $this->toRgb($this->baseColor);
    $lighterShadeRGB = array_map(function ($value) {
      return min(255, $value + 50);
    }, $baseColorRGB);
    $darkerShadeRGB = array_map(function ($value) {
      return max(0, $value - 50);
    }, $baseColorRGB);
    $monochromaticColors = array_map(function ($rgb) {
      return $this->toHex($rgb);
    }, [$baseColorRGB, $lighterShadeRGB, $darkerShadeRGB]);
    return $monochromaticColors;
  }

  /**
   * Generate triadic colors.
   * 
   * @return array An array containing the base color and two triadic colors.
   */
  public function triad()
  {
    $baseColorRGB = $this->toRgb($this->baseColor);
    $triadic1RGB = [$baseColorRGB[0], $baseColorRGB[1] + 120, $baseColorRGB[2]];
    $triadic2RGB = [$baseColorRGB[0], $baseColorRGB[1] - 120, $baseColorRGB[2]];
    $triadicColors = array_map(function ($rgb) {
      return $this->toHex($rgb);
    }, [$baseColorRGB, $triadic1RGB, $triadic2RGB]);
    return $triadicColors;
  }

  /**
   * Generate seasonal color analysis.
   * 
   * @return array An array containing the recommended colors for the current season.
   */
  public function seasonalAnalysis()
  {
    // For demonstration purposes, let's assume fixed seasonal colors
    $seasonalColors = [
      "Spring" => "#00ff7f", // Green
      "Summer" => "#1e90ff", // Dodger Blue
      "Autumn" => "#ffa500", // Orange
      "Winter" => "#4682b4" // Steel Blue
    ];

    // Get the season based on the current month (1 to 12)
    $currentMonth = date("n");
    switch (true) {
      case $currentMonth >= 3 && $currentMonth <= 5: // Spring (March, April, May)
        return $this->comp($seasonalColors["Spring"]);
      case $currentMonth >= 6 && $currentMonth <= 8: // Summer (June, July, August)
        return $this->comp($seasonalColors["Summer"]);
      case $currentMonth >= 9 && $currentMonth <= 11: // Autumn (September, October, November)
        return $this->comp($seasonalColors["Autumn"]);
      default: // Winter (December, January, February)
        return $this->comp($seasonalColors["Winter"]);
    }
  }

  /**
   * Generate tetradic (double complementary) colors.
   * 
   * @return array An array containing the base color and three tetradic colors.
   */
  public function tetrad()
  {
    $baseColorRGB = $this->toRgb($this->baseColor);
    $tetradic1RGB = [$baseColorRGB[0], $baseColorRGB[1] + 60, $baseColorRGB[2]];
    $tetradic2RGB = [$baseColorRGB[0] - 60, $baseColorRGB[1], $baseColorRGB[2]];
    $tetradic3RGB = [$baseColorRGB[0] + 60, $baseColorRGB[1], $baseColorRGB[2]];
    $tetradicColors = array_map(function ($rgb) {
      return $this->toHex($rgb);
    }, [$baseColorRGB, $tetradic1RGB, $tetradic2RGB, $tetradic3RGB]);
    return $tetradicColors;
  }

  /**
   * Generate split-complementary colors.
   * 
   * @return array An array containing the base color and two split-complementary colors.
   */
  public function splitComp()
  {
    $baseColorRGB = $this->toRgb($this->baseColor);
    $splitComp1RGB = [$baseColorRGB[0] + 150, $baseColorRGB[1] + 60, $baseColorRGB[2]];
    $splitComp2RGB = [$baseColorRGB[0] - 150, $baseColorRGB[1] + 60, $baseColorRGB[2]];
    $splitCompColors = array_map(function ($rgb) {
      return $this->toHex($rgb);
    }, [$baseColorRGB, $splitComp1RGB, $splitComp2RGB]);
    return $splitCompColors;
  }
}

// Base color
$baseColor = "#ff0000"; // Red

// Create instance of ColorCombinationGenerator
$colorCombinationGenerator = new ColorCombinationGenerator($baseColor);

// Generate color combinations
$complementaryColors = $colorCombinationGenerator->comp();
$analogousColors = $colorCombinationGenerator->analog();
$monochromaticColors = $colorCombinationGenerator->mono();
$triadicColors = $colorCombinationGenerator->triad();
$seasonalColors = $colorCombinationGenerator->seasonalAnalysis();
$tetradicColors = $colorCombinationGenerator->tetrad();
$splitCompColors = $colorCombinationGenerator->splitComp();

// Output the results
echo "Complementary Colors: " . implode(", ", $complementaryColors) . "<br>";
echo "Analogous Colors: " . implode(", ", $analogousColors) . "<br>";
echo "Monochromatic Colors: " . implode(", ", $monochromaticColors) . "<br>";
echo "Triadic Colors: " . implode(", ", $triadicColors) . "<br>";
echo "Seasonal Colors: " . implode(", ", $seasonalColors) . "<br>";
echo "Tetradic Colors: " . implode(", ", $tetradicColors) . "<br>";
echo "Split-Complementary Colors: " . implode(", ", $splitCompColors) . "<br>";
