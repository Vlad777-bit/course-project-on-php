<?php

namespace TestFolder\UserName;

class UserName
{
    public function __toString(): string
    {
        return "Hello from " . get_class($this) . "\n";
    }
}