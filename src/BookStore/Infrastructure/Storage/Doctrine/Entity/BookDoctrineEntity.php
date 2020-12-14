<?php

namespace App\BookStore\Infrastructure\Storage\Doctrine\Entity;

use App\BookStore\Domain\Book;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(readOnly=true)
 * @ORM\Table(name="book_doctrine_entity")
 */
class BookDoctrineEntity
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\Column(type="string")
     * @var string
     */
    private string $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private string $author;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private string $isbn;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private string $description;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private string $title;

    /**
     * @var \DateTimeImmutable
     * @ORM\Column(type="datetime_immutable")
     */
    private \DateTimeImmutable $publicationDate;

    /**
     * BookDoctrineEntity constructor.
     * @param string $id
     * @param string $isbn
     * @param string $author
     * @param string $description
     * @param string $title
     * @param \DateTimeImmutable|string $publicationDate
     */
    public function __construct(string $id, string $isbn, string $author, string $description, string $title, $publicationDate)
    {
        $this->id = $id;
        $this->isbn = $isbn;
        $this->author = $author;
        $this->description = $description;
        $this->title = $title;
        $this->publicationDate = $publicationDate;
    }

    public static function mapFromBook(Book $book): self
    {
        return new self(
            $book->getId()->toString(),
            $book->getIsbn()->toString(),
            $book->getAuthor()->toString(),
            $book->getDescription()->toString(),
            $book->getTitle()->toString(),
            new \DateTimeImmutable($book->getPublicationDate()->toString())
        );
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @return string
     */
    public function getIsbn(): string
    {
        return $this->isbn;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getPublicationDate(): \DateTimeImmutable
    {
        return $this->publicationDate;
    }
}