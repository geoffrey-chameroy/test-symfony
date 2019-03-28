<?php

namespace AppBundle\Manager;

use AppBundle\Entity\Article;
use AppBundle\Entity\Rate;
use AppBundle\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method ArticleRepository getRepository()
 * @method Article           getNew()
 * @method Article|null      get(int $id, bool $check = true)
 * @method Article[]         getList()
 * @method Article           save(Article $user)
 * @method void              remove(Article $user)
 * @method void              checkEntity(?Article $user)
 */
class ArticleManager extends AbstractEntityManager
{
    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, Article::class);
    }

    /**
     * @param Rate $rate
     * @return Article[]
     */
    public function getFilteredList(Rate $rate): array
    {
        return $this->getRepository()
            ->findBy([
                'rate' => $rate
            ]);
    }
}
