<?php

namespace App\BookStore\Application;

use App\BookStore\Domain\BookRepository;
use App\BookStore\Domain\Title;

class GetABookByTitleHandler
{
    private BookRepository $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function __invoke(GetABookByTitleCommand $getABookByTitleCommand): BookViewModel
    {
        $book = $this->bookRepository->getFromTitle(Title::fromString($getABookByTitleCommand->title));

        return new BookViewModel(
            $book->getIsbn()->toString(),
            $book->getTitle()->toString(),
            $book->getAuthor()->toString(),
            $book->getDescription()->toString(),
        );
    }
}
