<?php

namespace AppBundle\Twig;

use AppBundle\Service\RateService;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    /** @var RateService */
    private $rateService;

    public function __construct(RateService $rateService)
    {
        $this->rateService = $rateService;
    }

    public function getFilters()
    {
        return array(
            new TwigFilter('amountTTC', array($this, 'amountTTC')),
        );
    }

    public function amountTTC(float $amountHT, float $rate)
    {
        return $this->rateService->getAmountTTC($amountHT, $rate);
    }
}
