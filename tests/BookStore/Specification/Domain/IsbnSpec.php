<?php

namespace Specification\App\BookStore\Domain;

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
}
