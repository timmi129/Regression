<?php

namespace mcordingley\Regression\Linking;

use mcordingley\Regression\Linking;

/**
 * Identity
 * 
 * Default implementation of Linking that returns data untransformed. Used for
 * data that is already linear.
 */
class Identity implements Linking
{
    public function delinearize($value)
    {
        return $value;
    }
    
    public function linearize($value)
    {
        return $value;
    }
}