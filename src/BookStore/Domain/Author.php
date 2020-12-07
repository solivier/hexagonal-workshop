<?php


namespace App\BookStore\Domain;


class Author
{
    private string $author;

    /**
     * Author constructor.
     * @param string $author
     */
    public function __construct(string $author)
    {
        $this->author = $author;
    }

    public static function fromString(string $author): self
    {
        return new self($author);
    }

    public function toString(): string
    {
        return $this->author;
    }
}