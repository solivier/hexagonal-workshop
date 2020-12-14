<?php


namespace App\BookStore\Application\Read;


use App\BookStore\Domain\BookRepository;
use App\BookStore\Domain\Title;
use Doctrine\ORM\EntityManagerInterface;

class GetABookByTitleHandler
{
    /**
     * @var BookRepository
     */
    private BookRepository $bookRepository;

    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    /**
     * GetABookByTitleHandler constructor.
     * @param BookRepository $bookRepository
     */
    public function __construct(BookRepository $bookRepository, EntityManagerInterface $entityManager)
    {
        $this->bookRepository = $bookRepository;
        $this->entityManager = $entityManager;
    }


    public function __invoke(GetABookByTitleCommand $getABookByTitleCommand): array
    {

        $stmt = $this->entityManager
            ->getConnection()
            ->prepare("SELECT isbn, title, author from book_doctrine_entity WHERE title = :title");
        $stmt->bindValue("title", $getABookByTitleCommand->title);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}