<?php

declare(strict_types=1);

namespace App;

use Temporal\Activity\ActivityInterface;
use Temporal\Activity\ActivityMethod;

#[ActivityInterface(prefix: 'greeting.')]
interface GreetingActivity
{
    #[ActivityMethod(name: 'say')]
    public function greet(string $name): string;
}
