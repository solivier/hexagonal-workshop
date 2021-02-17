<?php

namespace App\BookStore\Infrastructure\UserInterface\Web;

use App\BookStore\Application\Read\GetABookByTitleCommand;
use App\BookStore\Infrastructure\Bus\QueryBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GetABookController
{
    private QueryBus $bus;

    public function __construct(QueryBus $bus)
    {
        $this->bus = $bus;
    }

    public function __invoke(Request $request): JsonResponse
    {
        $query = new GetABookByTitleCommand();
        $query->title = (string) $request->get('title');

        $book = $this->bus->fetch($query);

        return new JsonResponse($book, Response::HTTP_ACCEPTED);
    }
}
