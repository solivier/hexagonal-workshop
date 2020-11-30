<?php

namespace App\BookStore\Domain;

class Description
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function fromString(string $description): self
    {
        return new self($description);
    }

    public function toString(): string
    {
        return $this->value;
    }
}
