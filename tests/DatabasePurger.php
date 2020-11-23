<?php

declare(strict_types=1);

namespace App\Tests;

use Doctrine\ORM\EntityManagerInterface;

class DatabasePurger
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function beginTransaction(): void
    {
        $this->entityManager->beginTransaction();
    }

    public function rollback(): void
    {
        $this->entityManager->rollback();
    }
}
