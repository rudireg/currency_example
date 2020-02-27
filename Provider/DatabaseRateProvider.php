<?php

namespace App\Provider;

class DatabaseRateProvider implements RateProviderInterface
{
    /**
     * @var \PDO
     */
    private $pdo;

    /**
     * @todo использовать интерфейс вместо конктреной реазлизации БД, так как в будущем можем захотеть использовать иные SQL реализации
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @inheritDoc
     */
    public function giveCurrentRate(string $exchange): float
    {
        return $this->pdo->exec('SQL query ...');
    }

    /**
     * @inheritDoc
     */
    public function saveCurrentRate(string $exchange, float $value)
    {
        $this->pdo->exec('SQL query ...');
    }
}
