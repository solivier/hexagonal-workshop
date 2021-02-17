<?php

namespace Specification\App\BookStore\Domain;

use App\BookStore\Domain\Exception\InvalidIsbnException;
use App\BookStore\Domain\Isbn;
use PhpSpec\ObjectBehavior;

class IsbnSpec extends ObjectBehavior
{
    function let() {
        $this->beConstructedWith('978-2-02-130451-0');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Isbn::class);
    }

    function it_should_throw_an_exception_if_isbn_is_invalid()
    {
        $this->shouldThrow(InvalidIsbnException::class)->during('__construct', ['INVALID_ISBN']);
    }
}
