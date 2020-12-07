<?php

declare(strict_types=1);

namespace App\BookStore\Infrastructure\Storage;

use App\BookStore\Domain\Author;
use App\BookStore\Domain\Book;
use App\BookStore\Domain\BookId;
use App\BookStore\Domain\BookRepository;
use App\BookStore\Domain\Description;
use App\BookStore\Domain\Isbn;
use App\BookStore\Domain\PublicationDate;
use App\BookStore\Domain\Title;

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

    public function getFromTitle(Title $bookTitle): ?Book
    {
        $id = BookId::generate();
        $book = Book::create(
            $id,
            Isbn::fromString('2-7654-1005-4'),
            Title::fromString('Test'),
            Description::fromString('blablabla'),
            Author::fromString('michel'),
            PublicationDate::fromString('2020-12-07 09:00:00'),
        );

        $this->books[$id->toString()] = $book;

        $result = array_filter($this->books, function (Book $book) use ($bookTitle) {
            return $book->getTitle()->toString() === $bookTitle->toString();
        });

        return array_pop($result);
    }

    public function delete(BookId $bookId): void
    {
        $result = array_filter($this->books, function (Book $book) use ($bookId) {
            return $book->getId()->toString() === $bookId->toString();
        });

        $bookId = array_pop($result)->getId()->toString();
        unset($this->books[$bookId]);
    }
}
