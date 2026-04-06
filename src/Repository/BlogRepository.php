<?php

namespace App\Repository;

use App\Entity\Blog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @extends ServiceEntityRepository<Blog>
 */
class BlogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, private readonly PaginatorInterface $paginator)
    {
        parent::__construct($registry, Blog::class);
    }

    public function findPaginated(int $page): PaginationInterface
    {
        $qb = $this->createQueryBuilder('blog');
        $qb->orderBy('blog.publish_date', 'DESC');

        return $this->paginator->paginate($qb, $page, 12);
    }
}
