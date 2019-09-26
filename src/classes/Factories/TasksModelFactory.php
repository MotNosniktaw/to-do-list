<?php

namespace Example\Factories;

use Example\Models\TasksModel;
use Psr\Container\ContainerInterface;

class TasksModelFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $db = $container->get('db');
        $newTasksModel = new TasksModel($db);
        return $newTasksModel;
    }
}