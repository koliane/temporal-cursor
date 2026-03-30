<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use App\GreetingActivityImpl;
use App\GreetingWorkflowImpl;
use Temporal\WorkerFactory;

$factory = WorkerFactory::create();

$worker = $factory->newWorker('default');
$worker->registerWorkflowTypes(GreetingWorkflowImpl::class);
$worker->registerActivity(GreetingActivityImpl::class);

$factory->run();
