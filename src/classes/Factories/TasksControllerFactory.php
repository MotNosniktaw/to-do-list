<?php

namespace Example\Factories;

use Example\Controllers\TasksController;
use Psr\Container\ContainerInterface;

class TasksControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $renderer = $container->get('renderer');
        $model = $container->get('TasksModel');
        $newTasksController = new TasksController($renderer, $model);
        return $newTasksController;
    }
}