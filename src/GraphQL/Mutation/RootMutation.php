<?php

namespace App\GraphQL\Mutation;

use App\Entity\Book;
use App\GraphQL\Input\BookInput;
use App\Service\DataService;
use Overblog\GraphQLBundle\Annotation as GQL;

/**
 * @GQL\Type
 */
class RootMutation {

    private DataService $dataService;

    public function __construct(DataService $dataService)
    {
        $this->dataService = $dataService;
    }

    /**
     * @GQL\Mutation(name="saveBook", type="Book")
     * @GQL\Arg(name="bookInput", type="BookInput")
     */
    public function saveBook(BookInput $bookInput): ?Book
    {
        $book = new Book();
        $book = $this->morphBook($book, $bookInput);
        return $this->dataService->saveBook($book);
    }

    /**
     * @GQL\Mutation(name="updateBook", type="Book")
     * @GQL\Arg(name="id", type="Int")
     * @GQL\Arg(name="bookInput", type="BookInput")
     */
    public function updateBook(int $id, BookInput $bookInput): ?Book
    {
        $book = $this->dataService->getBook($id);
        if(is_null($book)) {
            return null;
        }
        $book = $this->morphBook($book, $bookInput);
        return $this->dataService->saveBook($book);
    }

    /**
     * @param Book $book
     * @param BookInput $bookInput
     * @return Book
     */
    public function morphBook(Book $book, BookInput $bookInput): Book
    {
        $book->setTitle($bookInput->getTitle());
        $book->setAuthors($bookInput->getAuthors());
        $book->setAverageRating($bookInput->getAverageRating());
        $book->setIsbn($bookInput->getIsbn());
        $book->setIsbn13($bookInput->getIsbn13());
        $book->setLanguageCode($bookInput->getLanguageCode());
        $book->setNumPages($bookInput->getNumPages());
        $book->setRatingsCount($bookInput->getRatingsCount());
        $book->setTextReviewsCount($bookInput->getTextReviewsCount());
        $book->setPublicationDate($bookInput->getPublicationDate());
        $book->setPublisher($bookInput->getPublisher());
        return $book;
    }
}
