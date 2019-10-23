<?php

namespace Example\Factories;

use Example\Controllers\IndexController;
use Psr\Container\ContainerInterface;

class IndexControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $renderer = $container->get('renderer');
        $model = $container->get('TasksModel');

        return new IndexController($renderer, $model);

    }
}