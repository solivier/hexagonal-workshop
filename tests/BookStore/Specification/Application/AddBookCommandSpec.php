<?php

namespace Specification\App\BookStore\Application;

use App\BookStore\Application\AddBookCommand;
use PhpSpec\ObjectBehavior;

class AddBookCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(AddBookCommand::class);
    }
}
