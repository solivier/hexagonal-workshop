<?php

declare(strict_types=1);

namespace App\BookStore\Application\Read;

use App\BookStore\Domain\BookRepository;
use Doctrine\ORM\EntityManagerInterface;

class GetABookByTitleHandler
{
    private BookRepository $bookRepository;

    private EntityManagerInterface $entityManager;

    public function __construct(BookRepository $bookRepository, EntityManagerInterface $entityManager)
    {
        $this->bookRepository = $bookRepository;
        $this->entityManager = $entityManager;
    }

    public function __invoke(GetABookByTitleCommand $getABookByTitleCommand): array
    {
        $stmt = $this->entityManager
            ->getConnection()
            ->prepare("SELECT isbn, title, author from book_doctrine_entity WHERE title = :title");
        $stmt->bindValue("title", $getABookByTitleCommand->title);
        $stmt->execute();

        return $stmt->fetchAllAssociative();
    }
}
