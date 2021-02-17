<?php

namespace Specification\App\BookStore\Application;

use App\BookStore\Application\AddBookCommand;
use App\BookStore\Application\AddBookHandler;
use App\BookStore\Domain\Book;
use App\BookStore\Domain\BookRepository;
use App\BookStore\Domain\Exception\InvalidIsbnException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AddBookHandlerSpec extends ObjectBehavior
{
    function let(BookRepository $bookRepository)
    {
        $this->beConstructedWith($bookRepository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(AddBookHandler::class);
    }

    function it_adds_a_book_to_the_store(BookRepository $bookRepository)
    {
        $addBookCommand = new AddBookCommand();
        $addBookCommand->title = 'Hexagonal Architecture';
        $addBookCommand->description = 'My awesome book description';
        $addBookCommand->isbn = '978-2-7654-0912-0';
        $addBookCommand->publicationDate = '2020-10-13';
        $addBookCommand->author = 'Michel';

        $bookRepository->save(Argument::type(Book::class))->shouldBeCalled();

        $this->__invoke($addBookCommand);
    }

    function it_should_throw_an_invalid_exception_if_isbn_is_invalid(BookRepository $bookRepository)
    {
        $addBookCommand = new AddBookCommand();
        $addBookCommand->title = 'Hexagonal Architecture';
        $addBookCommand->description = 'My awesome book description';
        $addBookCommand->isbn = 'an invalid isbn';
        $addBookCommand->publicationDate = '2020-10-13';
        $addBookCommand->author = 'Michel';

        $bookRepository->save(Argument::type(Book::class))->shouldNotBeCalled();

        $this->shouldThrow(InvalidIsbnException::class)->during('__invoke', [$addBookCommand]);
    }
}
