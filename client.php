<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use App\GreetingWorkflow;
use Temporal\Client\GRPC\ServiceClient;
use Temporal\Client\WorkflowClient;
use Temporal\Client\WorkflowOptions;

$workflowClient = WorkflowClient::create(
    ServiceClient::create('temporal:7233')
);

$workflow = $workflowClient->newWorkflowStub(
    GreetingWorkflow::class,
    WorkflowOptions::new()->withTaskQueue('default')
);

$run = $workflowClient->start($workflow, 'Cursor');
$result = $run->getResult();

echo "Workflow result: {$result}" . PHP_EOL;
