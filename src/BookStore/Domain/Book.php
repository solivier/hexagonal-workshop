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

    public function __construct(BookId $id, Isbn $isbn, Title $title, Description $description, Author $author, PublicationDate $publicationDate)
    {
        $this->id = $id;
        $this->isbn = $isbn;
        $this->title = $title;
        $this->description = $description;
        $this->author = $author;
        $this->publicationDate = $publicationDate;
    }

    public function create(
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

    /**
     * @return BookId
     */
    public function getId(): BookId
    {
        return $this->id;
    }

    /**
     * @return Isbn
     */
    public function getIsbn(): Isbn
    {
        return $this->isbn;
    }

    /**
     * @return Title
     */
    public function getTitle(): Title
    {
        return $this->title;
    }

    /**
     * @return Description
     */
    public function getDescription(): Description
    {
        return $this->description;
    }

    /**
     * @return Author
     */
    public function getAuthor(): Author
    {
        return $this->author;
    }

    /**
     * @return PublicationDate
     */
    public function getPublicationDate(): PublicationDate
    {
        return $this->publicationDate;
    }
}