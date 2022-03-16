<?php

namespace App\Migrations;

use App\Connections\ConnectorInterface;
use App\Connections\SqlLiteConnector;
use JetBrains\PhpStorm\Pure;

class Migration_version_3 implements MigrationsInterface
{
    private ConnectorInterface $connector;

    #[Pure] public function __construct(ConnectorInterface $connector = null)
    {
        $this->connector = $connector ?? new SqlLiteConnector();
    }

    public function execute(): void
    {
        $this->connector->getConnection()->query(
            "create table comments
                        (
                            id         integer primary key autoincrement,
                            post_id    varchar not null,
                            author_id  varchar not null,
                            text       varchar not null,
                            
                            foreign key (post_id) references articles(id),
                            foreign key (author_id) references users(id)
                        );"
        );
    }
}