<?php

namespace App\Classes\User;

use Exception;

class User implements IUser
{
    private string $id;
    private string $name;
    private string $surname;

    public function __construct(string $userName, string $userSurname)
    {
        $this->id = uniqid();
        $this->setName($userName);
        $this->setLastname($userSurname);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLastname(): string
    {
        return $this->surname;
    }

    public function setName(string $name): void
    {
       if (strlen($name) <= 1) {
           throw new Exception("Вы ввели слишком короткое имя!\n");
       }

       $this->name = htmlspecialchars($name);
    }

    public function setLastname(string $surname): void
    {
        if (strlen($surname) <= 1) {
            throw new Exception("Вы ввели слишком короткую фамилию!\n");
        }

        $this->surname = htmlspecialchars($surname);
    }

    public function __toString(): string
    {
        return "Id: " . $this->id ."\nИмя: " . $this->name . "\nФамилия: " .
            $this->surname . "\n\n";
    }
}