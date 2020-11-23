<?php

declare(strict_types=1);

namespace App\Tests\BookStore\EndToEnd\Api\Context;

use App\Tests\DatabasePurger;
use Behat\Behat\Context\Context;

class DatabaseContext implements Context
{
    private DatabasePurger $databasePurger;

    public function __construct(DatabasePurger $databasePurger)
    {
        $this->databasePurger = $databasePurger;
    }

    /**
     * @BeforeScenario
     */
    public function before(): void
    {
        $this->databasePurger->beginTransaction();
    }

    /**
     * @AfterScenario
     */
    public function after(): void
    {
        $this->databasePurger->rollback();
    }
}
