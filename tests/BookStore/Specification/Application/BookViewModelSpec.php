<?php

namespace Specification\App\BookStore\Application;

use App\BookStore\Application\BookViewModel;
use PhpSpec\ObjectBehavior;

class BookViewModelSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('title', 'isbn', 'author', 'description');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(BookViewModel::class);
    }
}
