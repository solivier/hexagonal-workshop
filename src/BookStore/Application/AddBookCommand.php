<?php


namespace App\BookStore\Application;


class AddBookCommand
{
    public string $title;
    public string $description;
    public string $author;
    public string $isbn;
    public string $publicationDate;
}