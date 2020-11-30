<?php

namespace Specification\App\BookStore\Domain;

use App\BookStore\Domain\PublicationDate;
use PhpSpec\ObjectBehavior;

class PublicationDateSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(PublicationDate::class);
    }
}
