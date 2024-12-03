<?php

declare(strict_types=1);

namespace App\Service;

use Doctrine\DBAL\Connection;

class MaSuperTesterConnection
{

    public function __construct(
        private Connection $connection
    )
    {
        // Ici, on peut imaginer que l'on se connecte à une base de données, un service externe, etc.
    }

    public function getSuperTesterData(): array
    {
         $sql = "SELECT * FROM property";
         $properties = $this->connection->fetchAllAssociative($sql);
         return $properties;
    }

    //create a function with query in params and array of params to bind
    public function getSuperTesterDataWithParams(string $sql, array $params): array
    {
         $properties = $this->connection->fetchAllAssociative($sql, $params);
         return $properties;
    }

}