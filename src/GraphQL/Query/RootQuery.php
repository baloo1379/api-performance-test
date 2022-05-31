<?php

namespace App\GraphQL\Query;

use App\Entity\Book;
use App\Entity\Song;
use App\Repository\BookRepository;
use App\Repository\SongRepository;
use Overblog\GraphQLBundle\Annotation as GQL;
use Psr\Log\LoggerInterface;

/**
 * @GQL\Type
 */
class RootQuery
{
    private BookRepository $bookRepository;
    private SongRepository $songRepository;

    public function __construct(BookRepository $bookRepository, SongRepository $songRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->songRepository = $songRepository;
    }

    /**
     * @GQL\Field(name="book", type="Book")
     */
    public function book(int $id): ?Book
    {
        return $this->bookRepository->find($id);
    }

    /**
     * @GQL\Field(name="song", type="Song")
     */
    public function song(int $id): ?Song
    {
        return $this->songRepository->find($id);
    }
}
