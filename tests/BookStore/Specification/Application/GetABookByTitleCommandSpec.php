<?php

namespace Specification\App\BookStore\Application;

use App\BookStore\Application\GetABookByTitleCommand;
use PhpSpec\ObjectBehavior;

class GetABookByTitleCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(GetABookByTitleCommand::class);
    }
}
