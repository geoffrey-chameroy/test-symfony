<?php

namespace AppBundle\Service;

class RateService
{
    /**
     * @param float $amountHT
     * @param float $rate
     * @return float
     */
    public function getAmountTTC(float $amountHT, float $rate): float
    {
        return $amountHT * (1 + $rate / 100);
    }
}
