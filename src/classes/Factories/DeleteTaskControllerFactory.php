<?php

namespace Example\Factories;

use Example\Controllers\DeleteTaskController;
use Psr\Container\ContainerInterface;

class DeleteTaskControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $renderer = $container->get('renderer');
        $tasksModel = $container->get('TasksModel');

        return new DeleteTaskController($renderer, $tasksModel);
    }
}