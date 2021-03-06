<?php

namespace App\BookStore\Domain;

class Author
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function fromString(string $author): self
    {
        return new self($author);
    }

    public function toString(): string
    {
        return $this->value;
    }
}
