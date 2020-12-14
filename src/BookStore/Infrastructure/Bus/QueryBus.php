<?php

declare(strict_types=1);

namespace App\BookStore\Infrastructure\Bus;


use App\BookStore\Infrastructure\Query;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

final class QueryBus
{
    use HandleTrait;

    public function __construct(MessageBusInterface $queryBus)
    {
        $this->messageBus = $queryBus;
    }

    /** @phpstan-ignore-next-line */
    public function fetch(Query $command)
    {
        return $this->handle($command);
    }
}