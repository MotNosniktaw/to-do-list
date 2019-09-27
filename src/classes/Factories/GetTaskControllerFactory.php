<?php

namespace Example\Factories;

use Example\Controllers\GetTaskController;
use Psr\Container\ContainerInterface;

class GetTaskControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $taskModel = $container->get('TasksModel');
        return new GetTaskController($taskModel);
    }
}