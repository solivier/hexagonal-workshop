<?php

namespace Specification\App\BookStore\Domain;

use App\BookStore\Domain\Title;
use PhpSpec\ObjectBehavior;

class TitleSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('My book title!');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Title::class);
    }
}
