<?php


namespace App\BookStore\Domain;


class PublicationDate
{
    private \DateTimeImmutable $date;

    /**
     * PublicationDate constructor.
     * @param \DateTimeImmutable $date
     */
    public function __construct(\DateTimeImmutable $date)
    {
        $this->date = $date;
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