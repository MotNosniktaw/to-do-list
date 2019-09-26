<?php

namespace Example\Factories;

use Example\Controllers\AddTaskController;
use Psr\Container\ContainerInterface;

class AddTaskControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $renderer = $container->get('renderer');
        $tasksModel = $container->get('TasksModel');

        return new AddTaskController($renderer, $tasksModel);
    }
}