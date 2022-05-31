<?php

namespace App\Service;

use App\Entity\Book;
use App\Repository\BookRepository;
use App\Repository\SongRepository;
use Doctrine\ORM\EntityNotFoundException;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class DataService
{
    private SerializerInterface $serializer;
    private BookRepository $bookRepository;
    private SongRepository $songRepository;
    private ManagerRegistry $doctrine;

    public function __construct(SerializerInterface $serializer, ManagerRegistry $doctrine, BookRepository $bookRepository, SongRepository $songRepository)
    {
        $this->serializer = $serializer;
        $this->bookRepository = $bookRepository;
        $this->songRepository = $songRepository;
        $this->doctrine = $doctrine;
    }

    public function getAllBooks($limit = 100): array
    {
        return $this->bookRepository->findBy([], [], $limit);
    }

    public function getAllSongs($limit = 100): array
    {
        return $this->songRepository->findBy([], [], $limit);
    }

    public function getBook(int $id): ?Book
    {
        return $this->bookRepository->find($id);
    }

    public function saveBook(mixed $requestBody): int
    {
        $entityManager = $this->doctrine->getManager();

        /** @var Book $book */
        $book = $this->serializer->deserialize($requestBody, Book::class, 'json');

        $entityManager->persist($book);
        $entityManager->flush();

        return $book->getId();
    }

    public function updateBook(Book $book, mixed $requestBody): Book
    {
        $entityManager = $this->doctrine->getManager();

        $this->serializer->deserialize($requestBody, Book::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $book]);

        $entityManager->persist($book);
        $entityManager->flush();

        return $book;
    }
}
