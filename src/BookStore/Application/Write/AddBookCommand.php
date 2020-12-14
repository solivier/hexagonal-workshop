<?php


namespace App\BookStore\Application\Write;

use App\BookStore\Infrastructure\Command;

class AddBookCommand implements Command
{
    public string $title;
    public string $description;
    public string $author;
    public string $isbn;
    public string $publicationDate;
}