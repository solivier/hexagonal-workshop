Feature:
    In order to manage a book store
    As a book seller
    I want to be able to add books and sell books

    @end-to-end-api @acceptance
    Scenario: I should be able to add a new book
        Given I am connected as a book seller
        And I add a new book in the store named "Initiation à l'architecture hexagonale" by author "Michel" published on "2019-10-12" at the price of "20" euros
        Then I should see the book in the store

    @end-to-end-api @acceptance
    Scenario: I should be able to list books on the store
        Given I am connected as a book buyer
        And I want to see all available books in the store
        Then I should see all books available in the store

    @end-to-end-api @acceptance
    Scenario: I should be able see book details
        Given I am connected as a book buyer
        And I want to see details about book named "Initiation à l'architecture hexagonale"
        Then I should see book name "Initiation à l'architecture hexagonale" by author "Michel" and cost "20" euros
