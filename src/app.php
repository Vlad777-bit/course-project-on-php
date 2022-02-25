<?php

use App\Classes\User\User;
use App\Classes\Article\Article;
use App\Classes\Comment\Comment;


function createFakeUser(): User
{
    $faker = Faker\Factory::create();
    return new User(
        $faker->name(),
        $faker->lastName()
    );
}

function createFakeArticle(): Article
{
    $faker = Faker\Factory::create();
    return new Article(
        $faker->uuid(),
        $faker->text(20),
        $faker->text(100)
    );
}

function createFakeComment(): Comment
{
    $faker = Faker\Factory::create();
    return new Comment(
        $faker->uuid(),
        $faker->uuid(),
        $faker->text(50)
    );
}

try {
    echo "\n" . match ($argv[1]) {
        "user" => createFakeUser(),
        "post" => createFakeArticle(),
        "comment" => createFakeComment(),
        default => "Что-то пошло не так(\n",
    };

} catch (Exception $e) {
    echo $e->getMessage();
}