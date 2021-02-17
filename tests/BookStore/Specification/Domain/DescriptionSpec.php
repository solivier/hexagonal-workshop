<?php

namespace Specification\App\BookStore\Domain;

use App\BookStore\Domain\Description;
use PhpSpec\ObjectBehavior;

class DescriptionSpec extends ObjectBehavior
{
    function let() {
        $this->beConstructedWith('Awesome book description');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Description::class);
    }
}
