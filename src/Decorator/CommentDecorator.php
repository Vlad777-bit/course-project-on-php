<?php

namespace App\Decorator;

use App\Entities\Article\Article;
use App\Entities\User\User;
use App\Exceptions\ArgumentException;
use App\Exceptions\CommandException;
use App\Services\ArgumentParserServiceInterface;

class CommentDecorator extends Decorator implements DecoratorInterface
{
    public const ID = 'id';
    public const AUTHOR = 'author';
    public const ARTICLE = 'article';
    public const TEXT = 'text';

    public ?int $id = null;
    public ?User $author;
    public ?Article $article;
    public string $text;

    public const REQUIRED_FIELDS = [
        self::AUTHOR,
        self::ARTICLE,
        self::TEXT
    ];

    private ?ArgumentParserServiceInterface $argumentParserService;

    /**
     * @throws ArgumentException
     * @throws CommandException
     */
    public function __construct(array $arguments)
    {
        parent::__construct($arguments);
        $commentFieldData = $this->getFieldData();

        $this->id = $commentFieldData->get(self::ID) ?? null;
        $this->author = $commentFieldData->get(self::AUTHOR) ?? null;
        $this->article = $commentFieldData->get(self::ARTICLE) ?? null;
        $this->text = $commentFieldData->get(self::TEXT) ?? null;
    }

    public function getRequiredFields(): array
    {
        return static::REQUIRED_FIELDS;
    }
}