<?php

use App\Migrations\Migration_version_1;
use App\Migrations\Migration_version_2;
use App\Migrations\Migration_version_3;

require_once __DIR__ . '/vendor/autoload.php';

// Создаём таблицу пользователей
$usersTable = new Migration_version_1();
$usersTable->execute();

// Создаём таблицу статей
$articlesTable = new Migration_version_2();
$articlesTable->execute();

// Создаём таблицу комментариев
$commentsTable = new Migration_version_3();
$commentsTable->execute();