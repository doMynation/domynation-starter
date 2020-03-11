<?php

namespace App;

final class MyService
{
    private MyDependencyA $depA;

    public function __construct(MyDependencyA $depA)
    {
        $this->depA = $depA;
    }

    public function doThing(): array
    {
        return [
            'id'   => 343904,
            'name' => "Yes",
        ];
    }

}