<?php

namespace App\Migrations;

use App\Connections\ConnectorInterface;
use App\Connections\SqlLiteConnector;
use JetBrains\PhpStorm\Pure;

class Migration_version_1 implements MigrationsInterface
{
    private ConnectorInterface $connector;

    #[Pure] public function __construct(ConnectorInterface $connector = null)
    {
        $this->connector = $connector ?? new SqlLiteConnector();
    }

    public function execute(): void
    {
        $this->connector->getConnection()->query(
            "create table users
                        (
                            id         integer primary key autoincrement,
                            first_name varchar not null,
                            last_name  varchar not null,
                            email      varchar not null unique 
                        );"
        );
    }
}