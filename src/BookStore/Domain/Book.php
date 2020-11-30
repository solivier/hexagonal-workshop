<?php

namespace App\BookStore\Domain;

class Book
{
    private BookId $id;
    private Isbn $isbn;
    private Title $title;
    private Description $description;
    private Author $author;
    private PublicationDate $publicationDate;

    private function __construct(BookId $id, Isbn $isbn, Title $title, Description $description, Author $author, PublicationDate $publicationDate)
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
}
