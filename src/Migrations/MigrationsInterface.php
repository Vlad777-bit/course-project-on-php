<?php

namespace App\Migrations;

interface MigrationsInterface
{
    public function execute(): void;
}