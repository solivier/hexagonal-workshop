<?php

namespace App\BookStore\Domain;

class PublicationDate
{
    private \DateTimeImmutable $date;

    private function __construct(\DateTimeImmutable $date)
    {
        $this->date = $date->setTime(0, 0, 0);
    }

    public static function fromString(string $date): self
    {
        return new self(new \DateTimeImmutable($date, new \DateTimeZone('UTC')));
    }

    public function toString(): string
    {
        return $this->date->format(\DateTimeInterface::ATOM);
    }

    public function toDateTime(): \DateTimeImmutable
    {
        return $this->date;
    }
}
