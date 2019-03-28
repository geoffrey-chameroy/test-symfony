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
 * @method Article           save(Article $article)
 * @method void              remove(Article $article)
 * @method void              checkEntity(?Article $article)
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
    public function getFilteredList(?Rate $rate): array
    {
        return $rate ? $this->getRepository()->findBy(['rate' => $rate]) : $this->getList();
    }
}
