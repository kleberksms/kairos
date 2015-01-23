<?php
namespace KairosCore\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class AbstractEntityRepository extends EntityRepository
{

    public $entity;

    /**
     * Return simple pagination
     * @param int $offset
     * @param int $limit
     * @return Paginator
     */
    public function getSimplePaging($offset = 0, $limit = 10)
    {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();

        $qb->select('s')
            ->from($this->entity, 's')
            ->orderBy('s.id')
            ->setMaxResults($limit)
            ->setFirstResult($offset);

        $query = $qb->getQuery();

        return new Paginator( $query );

    }

    public function fetchPairs()
    {
        $entities = $this->findAll();

        $array = array();

        foreach($entities as $entity) {
            $array[$entity->getId()] = $entity->getName();
        }

        return $array;
    }

} 