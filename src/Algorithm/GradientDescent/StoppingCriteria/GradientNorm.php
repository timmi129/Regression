<?php

namespace mcordingley\Regression\Algorithm\GradientDescent\StoppingCriteria;

/**
 * Stops when the normal of the gradient vector drops below some specified eta.
 * Good for Batch descent, when the gradient is fairly stable from one iteration
 * to the next. Not so good for Stochastic descent and MiniBatch with small
 * batch sizes, as those gradients won't settle near zero even as the weights
 * converge.
 *
 * @package mcordingley\Regression\Algorithm\GradientDescent\StoppingCriteria
 */
final class GradientNorm implements StoppingCriteria
{
    /** @var float */
    private $eta;

    /** @var int */
    private $pNorm;

    /**
     * @param float $eta
     * @param int $pNorm
     */
    public function __construct($eta = 6.103515625E-5, $pNorm = 2)
    {
        $this->eta = $eta;
        $this->pNorm = $pNorm;
    }

    /**
     * @param array $gradient
     * @param array $coefficients
     * @return bool
     */
    public function converged(array $gradient, array $coefficients)
    {
        return pow(array_sum(array_map(function ($slope) {
            return pow($slope, $this->pNorm);
        }, $gradient)), 1 / $this->pNorm) <= $this->eta;
    }
}
