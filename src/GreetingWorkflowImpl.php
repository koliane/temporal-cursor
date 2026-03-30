<?php

declare(strict_types=1);

namespace App;

use Temporal\Activity\ActivityOptions;
use Temporal\Workflow;

final class GreetingWorkflowImpl implements GreetingWorkflow
{
    public function run(string $name): \Generator
    {
        $activity = Workflow::newActivityStub(
            GreetingActivity::class,
            ActivityOptions::new()->withStartToCloseTimeout(new \DateInterval('PT10S'))
        );

        return yield $activity->greet($name);
    }
}
