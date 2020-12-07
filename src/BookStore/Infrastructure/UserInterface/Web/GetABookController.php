<?php

declare(strict_types=1);

namespace App\BookStore\Infrastructure\UserInterface\Web;

use App\BookStore\Application\GetABookByTitleCommand;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;

final class GetABookController
{
    private MessageBusInterface $bus;

    public function __construct(MessageBusInterface $bus)
    {
        $this->bus = $bus;
    }

    public function __invoke(Request $request): JsonResponse
    {
        $command = new GetABookByTitleCommand();
        $command->title = $request->get('title');

        $book = $this->bus->dispatch($command);

        return new JsonResponse($book, Response::HTTP_ACCEPTED);
    }
}
