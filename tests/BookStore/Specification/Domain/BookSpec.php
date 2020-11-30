<?php

namespace Specification\App\BookStore\Domain;

use App\BookStore\Domain\Book;
use PhpSpec\ObjectBehavior;

class BookSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Book::class);
    }
}
