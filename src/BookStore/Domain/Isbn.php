<?php

namespace App\BookStore\Domain;

use App\BookStore\Domain\Exception\InvalidIsbnException;

class Isbn
{
    private string $value;

    public function __construct(string $value)
    {
        if (!$this->checkIfIsbn($value)) {
            throw new InvalidIsbnException($value);
        }

        $this->value = $value;
    }

    public static function fromString(string $isbn): self
    {
        return new self($isbn);
    }

    public function toString(): string
    {
        return $this->value;
    }

    private function checkIfIsbn(string $isbn): bool
    {
        $regex = '/\b(?:ISBN(?:: ?| ))?((?:97[89])?\d{9}[\dx])\b/i';

        if (preg_match($regex, str_replace('-', '', $isbn), $matches)) {
            return true;
        }

        return false;
    }
}
