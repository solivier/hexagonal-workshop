<?php

declare(strict_types=1);

namespace App\BookStore\Infrastructure\Storage;

use App\BookStore\Domain\Book;
use App\BookStore\Domain\BookId;
use App\BookStore\Domain\BookRepository;

final class InMemoryBookRepository implements BookRepository
{
    /** @var array<Book> */
    private array $books = [];

    public function save(Book $book): void
    {
        $this->books[$book->getId()->toString()] = $book;
    }

    public function get(BookId $bookId): ?Book
    {
        return $this->books[$bookId->toString()];
    }

    public function delete(BookId $bookId): void
    {
        $result = array_filter($this->books, function (Book $book) use ($bookId) {
            return $book->getId()->toString() === $bookId->toString();
        });

        $bookId = array_pop($result)->id->toString();
        unset($this->books[$bookId]);
    }
}
