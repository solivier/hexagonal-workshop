<?php


namespace App\BookStore\Domain;


class Description
{
    private string $value;

    /**
     * Description constructor.
     * @param string $value
     */
    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function fromString(string $string): self
    {
        return new self($string);
    }

    public function toString(): string
    {
        return $this->value;
    }
}