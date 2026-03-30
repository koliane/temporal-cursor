<?php

declare(strict_types=1);

namespace App;

final class GreetingActivityImpl implements GreetingActivity
{
    public function greet(string $name): string
    {
        return "Hello, {$name} from Temporal activity!";
    }
}
