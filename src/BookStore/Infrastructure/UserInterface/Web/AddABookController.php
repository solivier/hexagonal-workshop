<?php

declare(strict_types=1);

namespace App\BookStore\Infrastructure\UserInterface\Web;

use App\BookStore\Application\AddBookCommand;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;

final class AddABookController
{
    private MessageBusInterface $bus;

    public function __construct(MessageBusInterface $bus)
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

        return new JsonResponse('Ok', Response::HTTP_ACCEPTED);
    }
}
