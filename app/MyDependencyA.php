<?php

namespace App;

final class MyDependencyA
{
    private int $size;
    private string $name;

    public function __construct(int $size, string $name)
    {
        $this->size = $size;
        $this->name = $name;
    }
}