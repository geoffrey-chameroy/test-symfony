<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Rate;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends AbstractFixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $rate1 = (new Rate())
            ->setRate(17);
        $manager->persist($rate1);

        $rate2 = (new Rate())
            ->setRate(20);
        $manager->persist($rate2);

        $manager->flush();
    }
}
