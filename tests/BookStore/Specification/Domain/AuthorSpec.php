<?php

namespace Specification\App\BookStore\Domain;

use App\BookStore\Domain\Author;
use PhpSpec\ObjectBehavior;

class AuthorSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('Michel');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Author::class);
    }
}
