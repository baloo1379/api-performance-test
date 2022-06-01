<?php

namespace App\GraphQL\Query;

use App\Entity\Book;
use App\Entity\Song;
use App\Service\DataService;
use Overblog\GraphQLBundle\Annotation as GQL;

/**
 * @GQL\Type
 */
class RootQuery
{
    private DataService $dataService;

    public function __construct(DataService $dataService)
    {
        $this->dataService = $dataService;
    }

    /**
     * @GQL\Field(name="book", type="Book")
     */
    public function book(int $id): ?Book
    {
        return $this->dataService->getBook($id);
    }

    /**
     * @GQL\Field(name="song", type="Song")
     */
    public function song(int $id): ?Song
    {
        return $this->dataService->getSong($id);
    }

    /**
     * @GQL\Field(name="all", type="All")
     * @GQL\Arg(name="limit", type="Int")
     */
    public function all(int $limit = 100): array
    {
        return ['books' => $this->dataService->getAllBooks($limit), 'songs' => $this->dataService->getAllSongs($limit)];
    }
}
