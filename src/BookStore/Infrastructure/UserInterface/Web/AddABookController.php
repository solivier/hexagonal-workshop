<?php

declare(strict_types=1);

namespace App\BookStore\Infrastructure\UserInterface\Web;

use App\BookStore\Application\Write\AddBookCommand;
use App\BookStore\Infrastructure\Bus\CommandBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class AddABookController
{
    private CommandBus $bus;

    public function __construct(CommandBus $bus)
    {
        $this->bus = $bus;
    }

    public function __invoke(Request $request): JsonResponse
    {
        $command = new AddBookCommand();
        $param = json_decode($request->getContent(), true);
        $command->title = (string) $param['title'];
        $command->description = (string) $param['description'];
        $command->author = (string) $param['author'];
        $command->isbn = (string) $param['isbn'];
        $command->publicationDate = (string) $param['publication_date'];

        $this->bus->dispatch($command);

        return new JsonResponse('Ok', Response::HTTP_OK);
    }
}
