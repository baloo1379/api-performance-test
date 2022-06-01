<?php

namespace App\Service;

use App\Entity\Book;
use App\Entity\Song;
use App\Repository\BookRepository;
use App\Repository\SongRepository;
use Doctrine\Persistence\ManagerRegistry;
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

    public function getSong(int $id): ?Song
    {
        return $this->songRepository->find($id);
    }

    public function saveBook(Book $book): Book
    {
        $this->bookRepository->add($book, true);

        return $book;
    }

}
