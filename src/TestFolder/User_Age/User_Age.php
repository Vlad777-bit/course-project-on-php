<?php

namespace TestFolder\User_Age;

class User_Age
{
    public function __toString(): string
    {
        return "Hello from " . get_class($this) . "\n";
    }
}