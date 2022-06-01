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
}
