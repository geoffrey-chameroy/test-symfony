<?php

namespace AppBundle\Tests\Service;

use AppBundle\Service\RateService;
use PHPUnit\Framework\TestCase;

class RateServiceTest extends TestCase
{
    public function testGetAmountTTC()
    {
        $rateService = new RateService();
        $result = $rateService->getAmountTTC(100, 17);
        $this->assertEquals(117, $result);

        $rateService = new RateService();
        $result = $rateService->getAmountTTC(100, 20);
        $this->assertEquals(120, $result);
    }
}
