<?php

namespace App\BookStore\Domain;

class Isbn
{
    private string $value;

    public function __construct(string $value)
    {
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
}
