<?php

namespace App\Factories;

use App\Connections\ConnectorInterface;
use App\Connections\SqlLiteConnector;

use App\Entities\Article\Article;
use App\Entities\Comment\Comment;
use App\Entities\User\User;

use App\Repositories\Article\ArticleRepository;
use App\Repositories\Comment\CommentRepository;
use App\Repositories\User\UserRepository;

use App\Repositories\EntityRepositoryInterface;
use JetBrains\PhpStorm\Pure;

class RepositoryFactory implements RepositoryFactoryInterface
{
    private ConnectorInterface $connector;

    #[Pure] public function __construct(ConnectorInterface $connector = null)
    {
        $this->connector = $connector ?? new SqlLiteConnector();
    }

    #[Pure] public function create(string $entityType): EntityRepositoryInterface
    {
        return match ($entityType) {
            User::class    => new UserRepository($this->connector),
            Article::class => new ArticleRepository($this->connector),
            Comment::class => new CommentRepository($this->connector),
        };
    }

}