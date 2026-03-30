<?php

declare(strict_types=1);

namespace App;

use Temporal\Workflow\WorkflowInterface;
use Temporal\Workflow\WorkflowMethod;

#[WorkflowInterface]
interface GreetingWorkflow
{
    #[WorkflowMethod(name: 'GreetingWorkflow')]
    public function run(string $name);
}
