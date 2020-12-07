<?php

declare(strict_types=1);

namespace App\BookStore\Domain\Exception;

use InvalidArgumentException;

final class InvalidIsbnException extends InvalidArgumentException
{
    public function __construct(string $isbn)
    {
        parent::__construct("The following value '{$isbn}' is not a valid isbn");
    }
}