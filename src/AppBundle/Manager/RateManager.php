<?php

namespace AppBundle\Manager;

use AppBundle\Entity\Rate;
use AppBundle\Repository\RateRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method RateRepository getRepository()
 * @method Rate           getNew()
 * @method Rate|null      get(int $id, bool $check = true)
 * @method Rate[]         getList()
 * @method Rate           save(Rate $rate)
 * @method void           remove(Rate $rate)
 * @method void           checkEntity(?Rate $rate)
 */
class RateManager extends AbstractEntityManager
{
    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Rate::class);
    }
}
