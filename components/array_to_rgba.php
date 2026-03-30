<?php
    # A function to take an array input of expected 4 elements (int[0..255], int[0..255], int[0..255], double(0..1)) 
    # and convert it to a CSS RGBA color value
    function makeRGBA(array $input): string {
        # Default value if array is invalid
        $default = 'rgba(0,0,0,0)';

        # Returns the default value if the size of the array is not equal to 4, i.e. it is not a valid RGBA value
        if (count($input) !== 4) return $default;

        # An array consisting of the R, G, B, and A value, mapped from the input
        [$r, $g, $b, $a] = $input;

        foreach([$r, $g, $b] as $value) {
            # Validates if the R, G, or B value is an int and is not less than 0 nor greater than 255
            if(!is_int($value) || $value < 0 || $value > 255) return $default;
        }

        # Validates if the A (alpha/opacity) value is a float or int, and if it's not less than 0 nor greater than 1
        if (!(is_float($a) || is_int($a)) || $a < 0 || $a > 1) return $default;

        return "rgba($r, $g, $b, $a)";
    }
?>
