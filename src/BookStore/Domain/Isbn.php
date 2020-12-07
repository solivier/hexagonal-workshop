<?php


namespace App\BookStore\Domain;


class Isbn
{
    private string $isbn;

    /**
     * Isbn constructor.
     * @param string $isbn
     */
    public function __construct(string $isbn)
    {
        if (!$this->checkIfIsbn($isbn)) {
            throw new InvalidIsbnException($isbn);
        }
        $this->isbn = $isbn;
    }

    public static function fromString(string $isbn): self
    {
        return new self($isbn);
    }

    public function toString(): self
    {
        return $this->isbn;
    }

    public function checkIfIsbn(string $isbn): bool
    {
        $regex = '/\b(?:ISBN(?:: ?| ))?((?:97[89])?\d{9}[\dx])\b/i';

        if (preg_match($regex, str_replace('-', '', $isbn), $matches)) {
            return true;
        }
        return false;
    }
}