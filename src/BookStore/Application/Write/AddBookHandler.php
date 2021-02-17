<?php

namespace App\BookStore\Application\Write;

use App\BookStore\Domain\Book;
use App\BookStore\Domain\BookId;
use App\BookStore\Domain\BookRepository;
use App\BookStore\Domain\Description;
use App\BookStore\Domain\Isbn;
use App\BookStore\Domain\PublicationDate;
use App\BookStore\Domain\Title;
use App\BookStore\Domain\Author;

class AddBookHandler
{
    private BookRepository $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function __invoke(AddBookCommand $addBookCommand): void
    {
        $book = Book::create(
            BookId::generate(),
            Isbn::fromString($addBookCommand->isbn),
            Title::fromString($addBookCommand->title),
            Description::fromString($addBookCommand->description),
            Author::fromString($addBookCommand->author),
            PublicationDate::fromString($addBookCommand->publicationDate),
        );
        $this->bookRepository->save($book);
    }
}
