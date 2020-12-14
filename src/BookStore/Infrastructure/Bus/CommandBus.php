<?php

declare(strict_types=1);

namespace App\BookStore\Infrastructure\Bus;


use App\BookStore\Infrastructure\Command;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

final class CommandBus
{
    use HandleTrait;

    public function __construct(MessageBusInterface $commandBus)
    {
        $this->messageBus = $commandBus;
    }

    /** @phpstan-ignore-next-line */
    public function dispatch(Command $command)
    {
        return $this->handle($command);
    }
}