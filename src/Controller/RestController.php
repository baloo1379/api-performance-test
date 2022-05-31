<?php

namespace App\Controller;

use App\Service\DataService;
use Doctrine\ORM\EntityNotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
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
    public function saveBook(DataService $dataService, Request $request): Response
    {
        $requestBody = $request->getContent();

        $id = $dataService->saveBook($requestBody);

        return new JsonResponse(['id' => $id]);
    }

    /**
     * @Route("/book/{id}", name="updateBook", requirements={"id"="\d+"}, methods={"PUT"})
     */
    public function updateBook(DataService $dataService, SerializerInterface $serializer, Request $request, int $id): Response
    {
        $requestBody = $request->getContent();

        $book = $dataService->getBook($id);
        if(is_null($book)) {
            return new JsonResponse(['error' => 'Entity "Book" of id ['.$id.'] not found'], 404);
        }

        $book = $dataService->updateBook($book, $requestBody);

        $response = $serializer->serialize($book, 'json');

        return JsonResponse::fromJsonString($response);

    }
}
