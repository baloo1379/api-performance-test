<?php

namespace App\Controller;

use App\Entity\Book;
use App\Service\DataService;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/rest")
 */
class RestController extends AbstractController
{
    /**
     * @Route("/all", name="all", methods={"GET","HEAD"})
     */
    public function all(DataService $dataService, SerializerInterface $serializer, Request $request): Response
    {
        $limit = $request->query->get('limit');

        $books = $dataService->getAllBooks($limit);
        $songs = $dataService->getAllSongs($limit);

        $response = $serializer->serialize([
            'books' => $books,
            'songs' => $songs
        ], 'json');

        return JsonResponse::fromJsonString($response);
    }

    /**
     * @Route("/book/{id}", name="getBook", requirements={"id"="\d+"}, methods={"GET","HEAD"})
     */
    public function getBook(DataService $dataService, SerializerInterface $serializer, int $id): Response
    {
        $book = $dataService->getBook($id);
        if(is_null($book)) {
            return new JsonResponse(['error' => 'Entity "Book" of id ['.$id.'] not found'], 404);
        }

        $response = $serializer->serialize($book, 'json');

        return JsonResponse::fromJsonString($response);
    }

    /**
     * @Route("/book", name="saveBook", methods={"POST"})
     */
    public function saveBook(DataService $dataService, Request $request, SerializerInterface $serializer): Response
    {
        $requestBody = $request->getContent();

        $book = $serializer->deserialize($requestBody, Book::class, 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => false]);

        $book = $dataService->saveBook($book);

        $response = $serializer->serialize($book, 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => false]);

        return JsonResponse::fromJsonString($response);
    }

    /**
     * @Route("/book/{id}", name="updateBook", requirements={"id"="\d+"}, methods={"PUT"})
     */
    public function updateBook(DataService $dataService, SerializerInterface $serializer, LoggerInterface $logger, Request $request, int $id): Response
    {
        $requestBody = $request->getContent();

        $book = $dataService->getBook($id);
        if(is_null($book)) {
            return new JsonResponse(['error' => 'Entity "Book" of id ['.$id.'] not found'], 404);
        }

        $serializer->deserialize($requestBody, Book::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $book, AbstractObjectNormalizer::SKIP_NULL_VALUES => false]);

        $book = $dataService->saveBook($book);

        $response = $serializer->serialize($book, 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => false]);

        return JsonResponse::fromJsonString($response);

    }
}
