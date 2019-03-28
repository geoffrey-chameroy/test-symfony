<?php

namespace AppBundle\Manager;

use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

abstract class AbstractEntityManager
{
    /** @var EntityManagerInterface */
    private $_em;

    /** @var string */
    private $_entityName;

    /** @var ObjectRepository */
    private $_repository;

    /**
     * @param EntityManagerInterface $em
     * @param string $entityName
     */
    public function __construct(EntityManagerInterface $em, string $entityName)
    {
        $this->_em = $em;
        $this->_entityName = $entityName;
        $this->_repository = $em->getRepository($entityName);
    }

    /**
     * @return EntityManagerInterface
     */
    public function getManager(): EntityManagerInterface
    {
        return $this->_em;
    }

    /**
     * @return ObjectRepository
     */
    public function getRepository(): ObjectRepository
    {
        return $this->_repository;
    }

    /**
     * @return mixed
     */
    public function getNew()
    {
        return new $this->_entityName();
    }

    /**
     * @param int $id
     * @param bool $check
     * @return object|null
     */
    public function get(int $id, bool $check = true)
    {
        $entity = $this->_repository->find($id);
        if ($check) {
            $this->checkEntity($entity);
        }

        return $entity;
    }

    /**
     * @return array
     */
    public function getList(): array
    {
        return $this->_repository->findAll();
    }

    /**
     * @param $entity
     * @return mixed
     */
    public function save($entity)
    {
        $this->_em->persist($entity);
        $this->_em->flush();

        return $entity;
    }

    /**
     * @param $entity
     */
    public function remove($entity)
    {
        if (!$entity) {
            return;
        }

        $this->_em->remove($entity);
        $this->_em->flush();
    }

    /**
     * @param $entity
     */
    protected function checkEntity($entity)
    {
        if (!$entity) {
            throw new NotFoundHttpException();
        }
    }
}
