<?php

namespace App\BookStore\Infrastructure\Storage\Doctrine\Repository\Book;

use App\BookStore\Domain\Author;
use App\BookStore\Domain\Book;
use App\BookStore\Domain\BookId;
use App\BookStore\Domain\BookRepository as BookRepositoryInterface;
use App\BookStore\Domain\Description;
use App\BookStore\Domain\Isbn;
use App\BookStore\Domain\PublicationDate;
use App\BookStore\Domain\Title;
use App\BookStore\Infrastructure\Storage\Doctrine\Entity\BookDoctrineEntity;
use Doctrine\ORM\EntityManagerInterface;

class BookRepository implements BookRepositoryInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function get(BookId $bookId): ?Book
    {
        $book = $this->entityManager->getRepository(BookDoctrineEntity::class)->find($bookId->toString());

        if (null === $book) {
            return null;
        }

        return Book::create(
            BookId::fromString($book->getId()),
            Isbn::fromString($book->getIsbn()),
            Title::fromString($book->getTitle()),
            Description::fromString($book->getDescription()),
            Author::fromString($book->getAuthor()),
            PublicationDate::fromString($book->getPublicationDate()->format(\DateTime::ATOM))
        );
    }

    public function getFromTitle(Title $title): ?Book
    {
        $book = $this->entityManager->getRepository(BookDoctrineEntity::class)->findOneBy(['title' => $title->toString()]);

        if (null === $book) {
            return null;
        }

        return Book::create(
            BookId::fromString($book->getId()),
            Isbn::fromString($book->getIsbn()),
            Title::fromString($book->getTitle()),
            Description::fromString($book->getDescription()),
            Author::fromString($book->getAuthor()),
            PublicationDate::fromString($book->getPublicationDate()->format(\DateTime::ATOM))
        );
    }

    public function save(Book $book): void
    {
        $this->entityManager->persist(BookDoctrineEntity::mapFromBook($book));
        $this->entityManager->flush();
    }

    public function delete(BookId $bookId): void
    {
        $book = $this->entityManager
            ->getRepository(BookDoctrineEntity::class)
            ->findOneBy([
                'id' => $bookId->toString()
            ]);

        if (null === $book) {
            return;
        }

        $this->entityManager->remove($book);
    }
}
