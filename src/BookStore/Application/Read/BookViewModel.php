<?php


namespace App\BookStore\Application\Read;


class BookViewModel
{
    public string $isbn;
    public string $title;
    public string $author;
    public string $description;

    /**
     * BookViewModel constructor.
     * @param string $isbn
     * @param string $title
     * @param string $author
     * @param string $description
     */
    public function __construct(string $isbn, string $title, string $author, string $description)
    {
        $this->isbn = $isbn;
        $this->title = $title;
        $this->author = $author;
        $this->description = $description;
    }

}