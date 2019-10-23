<?php

namespace Example\Factories;

use Example\Controllers\CompleteTaskController;
use Psr\Container\ContainerInterface;

class CompleteTaskControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $renderer = $container->get('renderer');
        $tasksModel = $container->get('TasksModel');

        return new CompleteTaskController($renderer, $tasksModel);
    }
}