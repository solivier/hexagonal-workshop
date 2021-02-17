installation:

make dev


workshop:

make book-store-phpspec-desc
App/BookStore/Domain/Book
App/BookStore/Domain/BookId
App/BookStore/Domain/Isbn
App/BookStore/Domain/Title
App/BookStore/Domain/Description
App/BookStore/Domain/Author
App/BookStore/Domain/PublicationDate

Then add in BookSpec:
    function it_should_return_a_new_book()
    {
        $this->create()->shouldReturnAnInstanceOf(Book::class);
    }
    
Then run:
make book-store-phpspec

Then improve book

