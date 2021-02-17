<?php

namespace Specification\App\BookStore\Domain;

use App\BookStore\Domain\BookId;
use PhpSpec\ObjectBehavior;

class BookIdSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(BookId::class);
    }
}
