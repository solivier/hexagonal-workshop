<?php

namespace App\BookStore\Domain;

interface BookRepository
{
    public function get(BookId $bookId): ?Book;
    public function getFromTitle(Title $title): ?Book;
    public function save(Book $book): void;
    public function delete(BookId $bookId): void;
}
