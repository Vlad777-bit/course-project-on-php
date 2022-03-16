<?php

namespace App\Migrations;

use App\Connections\ConnectorInterface;
use App\Connections\SqlLiteConnector;
use JetBrains\PhpStorm\Pure;

class Migration_version_2 implements MigrationsInterface
{
    private ConnectorInterface $connector;

    #[Pure] public function __construct(ConnectorInterface $connector = null)
    {
        $this->connector = $connector ?? new SqlLiteConnector();
    }

    public function execute(): void
    {
        $this->connector->getConnection()->query(
            "create table articles
                        (
                            id         integer primary key autoincrement,
                            author_id  varchar not null,
                            title      varchar not null,
                            text       varchar not null,
                            
                            foreign key (author_id) references users(id)
                        );"
        );
    }
}