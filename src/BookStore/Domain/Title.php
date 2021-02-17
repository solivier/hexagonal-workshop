<?php

namespace App\BookStore\Domain;

class Title
{
    private string $title;

    private function __construct(string $title)
    {
        $this->title = $title;
    }

    public static function fromString(string $title): self
    {
        return new self($title);
    }

    public function toString(): string
    {
        return $this->title;
    }
}
