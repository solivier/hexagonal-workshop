<?php

declare(strict_types=1);

namespace App\Tests\BookStore\Acceptance\Context;

use App\Tests\Store;
use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;

final class BookStoreContext implements Context
{
    private Store $store;

    public function __construct(Store $store)
    {
        $this->store = $store;
    }

    /**
     * @Given I am connected as a book seller
     */
    public function iAmConnectedAsABookSeller()
    {
        throw new PendingException();
    }

    /**
     * @Given I add a new book in the store named :arg1 by author :arg2 published on :arg3 at the price of :arg4 euros
     */
    public function iAddANewBookInTheStoreNamedByAuthorPublishedOnAtThePriceOfEuros($arg1, $arg2, $arg3, $arg4)
    {
        throw new PendingException();
    }

    /**
     * @Then I should see the book in the store
     */
    public function iShouldSeeTheBookInTheStore()
    {
        throw new PendingException();
    }

    /**
     * @Given I am connected as a book buyer
     */
    public function iAmConnectedAsABookBuyer()
    {
        throw new PendingException();
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
