<?php


namespace App\BookStore\Domain;


use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class BookId
{
    private UuidInterface $uuid;

    public static function generate(): self
    {
        return new self(Uuid::uuid4());
    }

    public static function fromString(string $string): self
    {
        return new self(Uuid::fromString($string));
    }

    /**
     * BookId constructor.
     * @param UuidInterface $uuid
     */
    private function __construct(UuidInterface $uuid)
    {
        $this->uuid = $uuid;
    }

    public function toString(): string
    {
        return $this->uuid->toString();
    }
}