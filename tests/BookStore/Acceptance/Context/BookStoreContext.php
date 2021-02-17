<?php

declare(strict_types=1);

namespace App\Tests\BookStore\Acceptance\Context;

use App\BookStore\Application\AddBookCommand;
use App\BookStore\Application\GetABookByTitleCommand;
use App\Tests\Store;
use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Symfony\Component\Messenger\MessageBusInterface;
use Webmozart\Assert\Assert;

final class BookStoreContext implements Context
{
    private Store $store;
    private MessageBusInterface $bus;

    public function __construct(Store $store, MessageBusInterface $bus)
    {
        $this->store = $store;
        $this->bus = $bus;
    }

    /**
     * @Given I am connected as a book seller
     */
    public function iAmConnectedAsABookSeller()
    {
        return true;
    }

    /**
         * @Given I add a new book in the store named :title by author :author published on :date at the price of :price euros
     */
    public function iAddANewBookInTheStoreNamedByAuthorPublishedOnAtThePriceOfEuros($title, $author, $date, $price)
    {
        $addBookCommand = new AddBookCommand();
        $addBookCommand->title = $title;
        $addBookCommand->author = $author;
        $addBookCommand->publicationDate = $date;

        $this->store->set('book_title', $title);

        $this->bus->dispatch($addBookCommand);
    }

    /**
     * @Then I should see the book in the store
     */
    public function iShouldSeeTheBookInTheStore()
    {
        $getABookByTitleCommand = new GetABookByTitleCommand();
        $getABookByTitleCommand->title = $this->store->get('book_title');

        $book = $this->bus->dispatch($getABookByTitleCommand);

        Assert::eq($book->getTitle()->toString(), $this->store->get('book_title'));
    }

    /**
     * @Given I am connected as a book buyer
     */
    public function iAmConnectedAsABookBuyer()
    {
        return true;
    }

    /**
     * @Given I want to see all available books in the store
     */
    public function iWantToSeeAllAvailableBooksInTheStore()
    {
        throw new PendingException();
    }

    /**
     * @Then I should see all books available in the store
     */
    public function iShouldSeeAllBooksAvailableInTheStore()
    {
        throw new PendingException();
    }

    /**
     * @Given I want to see details about book named :arg1
     */
    public function iWantToSeeDetailsAboutBookNamed($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I should see book name :arg1 by author :arg2 and cost :arg3 euros
     */
    public function iShouldSeeBookNameByAuthorAndCostEuros($arg1, $arg2, $arg3)
    {
        throw new PendingException();
    }
}
