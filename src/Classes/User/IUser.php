<?php

namespace App\Classes\User;


interface IUser
{
    public function getId(): string;

    public function getName(): string;

    public function getLastname(): string;

    public function setName(string $name): void;

    public function setLastname(string $surname): void;
}