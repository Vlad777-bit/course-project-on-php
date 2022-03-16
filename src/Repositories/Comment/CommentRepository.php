<?php

namespace App\Repositories\Comment;

use App\Entities\EntityInterface;
use App\Entities\Comment\Comment;
use App\Exceptions\CommentNotFoundException;
use App\Repositories\EntityRepository;

use PDO;
use PDOStatement;

class CommentRepository extends EntityRepository implements CommentRepositoryInterface
{
    /**
     * @param EntityInterface $entity
     * @return void
     */
    public function save(EntityInterface $entity): void
    {
        /**
         * @var Comment $entity
         */
        $statement = $this->connector->getConnection()
            ->prepare("INSERT INTO comments (post_id, author_id, text) 
                VALUES (:post_id, :author_id, :text)");

        $statement->execute(
            [
                ':post_id' => $entity->getAuthor(),
                ':author_id' => $entity->getArticle(),
                ':text' => $entity->getText(),
            ]
        );
    }

    /**
     * @throws CommentNotFoundException
     */
    public function get(int $id): Comment
    {
        $statement = $this->connector->getConnection()->prepare(
            'SELECT * FROM comments WHERE id = :id'
        );

        $statement->execute([
            ':id' => (string)$id,
        ]);

        return $this->getComment($statement, $id);
    }

    /**
     * @throws CommentNotFoundException
     */
    private function getComment(PDOStatement $statement, int $commentId): Comment
    {
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if (false === $result) {
            throw new CommentNotFoundException(
                sprintf("Cannot find comment with id: %s", $commentId));
        }

        return new Comment($result['post_id'], $result['author_id'], $result['text']);
    }
}