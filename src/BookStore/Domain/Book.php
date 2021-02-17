<?php

declare(strict_types=1);

namespace App\BookStore\Domain;

class Book
{
    private BookId $id;
    private Isbn $isbn;
    private Title $title;
    private Description $description;
    private Author $author;
    private PublicationDate $publicationDate;

    public function __construct(BookId $id, Isbn $isbn, Title $title, Description $description, Author $author, PublicationDate $publicationDate)
    {
        $this->id = $id;
        $this->isbn = $isbn;
        $this->title = $title;
        $this->description = $description;
        $this->author = $author;
        $this->publicationDate = $publicationDate;
    }

    public static function create(
        BookId $id,
        Isbn $isbn,
        Title $title,
        Description $description,
        Author $author,
        PublicationDate $publicationDate
    ): self
    {
        return new self($id, $isbn, $title, $description, $author, $publicationDate);
    }

    public function getId(): BookId
    {
        return $this->id;
    }

    public function getIsbn(): Isbn
    {
        return $this->isbn;
    }

    public function getTitle(): Title
    {
        return $this->title;
    }

    public function getDescription(): Description
    {
        return $this->description;
    }

    public function getAuthor(): Author
    {
        return $this->author;
    }

    public function getPublicationDate(): PublicationDate
    {
        return $this->publicationDate;
    }
}
