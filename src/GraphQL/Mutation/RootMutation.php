<?php

namespace App\GraphQL\Mutation;

use App\GraphQL\Input\BookInput;
use Psr\Log\LoggerInterface;
use Overblog\GraphQLBundle\Annotation as GQL;

/**
 * @GQL\Type
 */
class RootMutation {
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @GQL\Mutation(name="book", type="String")
     * @GQL\Arg(name="book", type="BookInput")
     */
    public function saveBook(BookInput $book): String
    {
        return "Hello!!".$book->getTitle();
    }
}
