<?php

namespace Specification\App\BookStore\Application;

use App\BookStore\Application\BookViewModel;
use App\BookStore\Application\GetABookByTitleCommand;
use App\BookStore\Application\GetABookByTitleHandler;
use App\BookStore\Domain\Author;
use App\BookStore\Domain\Book;
use App\BookStore\Domain\BookId;
use App\BookStore\Domain\BookRepository;
use App\BookStore\Domain\Description;
use App\BookStore\Domain\Isbn;
use App\BookStore\Domain\PublicationDate;
use App\BookStore\Domain\Title;
use PhpSpec\ObjectBehavior;

class GetABookByTitleHandlerSpec extends ObjectBehavior
{
    function let(BookRepository $bookRepository)
    {
        $this->beConstructedWith($bookRepository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(GetABookByTitleHandler::class);
    }

    function it_returns_a_book_by_its_title(BookRepository $bookRepository)
    {
        $getABookByTitleCommand = new GetABookByTitleCommand();
        $getABookByTitleCommand->title = "Hexagonal Architecture";

        $book = Book::create(
            BookId::generate(),
            Isbn::fromString('978-3-16-148410-0'),
            Title::fromString('my title'),
            Description::fromString('my desc'),
            Author::fromString('Michel'),
            PublicationDate::fromString('2020-10-12'),
        );

        $bookRepository->getFromTitle(Title::fromString($getABookByTitleCommand->title))->willReturn($book);

        $this->__invoke($getABookByTitleCommand)->shouldReturnAnInstanceOf(BookViewModel::class);;
    }
}
