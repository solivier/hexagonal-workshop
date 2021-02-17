<?php

namespace App\BookStore\Domain;

class Title
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function fromString(string $title): self
    {
        return new self($title);
    }

    public function toString(): string
    {
        return $this->value;
    }
}
