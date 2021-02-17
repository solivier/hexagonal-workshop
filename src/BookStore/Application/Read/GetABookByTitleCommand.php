<?php

declare(strict_types=1);

namespace App\BookStore\Application\Read;

use App\BookStore\Infrastructure\Query;

class GetABookByTitleCommand implements Query
{
     public string $title;
}
