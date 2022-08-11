<?php

namespace App\WSDL;

use App\Entity\Book;
use App\Service\DataService as RestDataService;
use Doctrine\Persistence\ManagerRegistry;
use JetBrains\PhpStorm\ArrayShape;
use Symfony\Component\Serializer\SerializerInterface;

class DataService
{
    private RestDataService $dataService;
    private ManagerRegistry $doctrine;

    public function __construct(RestDataService $dataService, ManagerRegistry $doctrine)
    {
        $this->dataService = $dataService;
        $this->doctrine = $doctrine;
    }

    public function hello(string $name): string
    {
        return 'Hello ' . $name;
    }

    public function getAll(int $limit): array
    {
        $books = $this->dataService->getAllBooks($limit);
        $songs = $this->dataService->getAllSongs($limit);

        return ['books' => $books, 'songs' => $songs];
    }

    public function getBook(int $id): ?Book
    {
        return $this->dataService->getBook($id);
    }

    public function saveBook(
        ?string $title,
        ?string $authors,
        ?float $average_rating,
        ?string $isbn,
        ?string $isbn13,
        ?string $language_code,
        ?int $num_pages,
        ?int $ratings_count,
        ?int $text_reviews_count,
        ?string $publication_date,
        ?string $publisher,
    ): Book
    {
        $entityManager = $this->doctrine->getManager();

        $book = new Book();
        $book->setTitle($title);
        $book->setAuthors($authors);
        $book->setAverageRating($average_rating);
        $book->setIsbn($isbn);
        $book->setIsbn13($isbn13);
        $book->setLanguageCode($language_code);
        $book->setNumPages($num_pages);
        $book->setRatingsCount($ratings_count);
        $book->setTextReviewsCount($text_reviews_count);
        $book->setPublicationDate($publication_date);
        $book->setPublisher($publisher);

        $entityManager->persist($book);
        $entityManager->flush();

        return $book;
    }

    public function updateBook(
        ?int $id,
        ?string $title,
        ?string $authors,
        ?float $average_rating,
        ?string $isbn,
        ?string $isbn13,
        ?string $language_code,
        ?int $num_pages,
        ?int $ratings_count,
        ?int $text_reviews_count,
        ?string $publication_date,
        ?string $publisher,
    ): ?Book
    {
        $entityManager = $this->doctrine->getManager();

        $book = $this->dataService->getBook($id);
        if(is_null($book)) {
            return null;
        }

        $book->setTitle($title);
        $book->setAuthors($authors);
        $book->setAverageRating($average_rating);
        $book->setIsbn($isbn);
        $book->setIsbn13($isbn13);
        $book->setLanguageCode($language_code);
        $book->setNumPages($num_pages);
        $book->setRatingsCount($ratings_count);
        $book->setTextReviewsCount($text_reviews_count);
        $book->setPublicationDate($publication_date);
        $book->setPublisher($publisher);

        $entityManager->persist($book);
        $entityManager->flush();

        return $book;
    }
}
