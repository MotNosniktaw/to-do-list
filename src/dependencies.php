<?php

use Example\Factories\IndexControllerFactory;
use Example\Factories\TasksModelFactory;
use Example\Factories\AddTaskControllerFactory;
use Example\Factories\CompleteTaskControllerFactory;
use Example\Factories\DeleteTaskControllerFactory;
use Slim\App;

return function (App $app) {
    $container = $app->getContainer();

    // view renderer
    $container['renderer'] = function ($c) {
        $settings = $c->get('settings')['renderer'];
        return new \Slim\Views\PhpRenderer($settings['template_path']);
    };

    // monolog
    $container['logger'] = function ($c) {
        $settings = $c->get('settings')['logger'];
        $logger = new \Monolog\Logger($settings['name']);
        $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
        $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
        return $logger;
    };

    $container['db'] = function ($container) {
        $settings = $container->get('settings')['db'];
        $db = new \PDO('mysql:host=' . $settings['host'] . ';dbname=' . $settings['dbname'], $settings['username'], $settings['password']);
        return $db;
    };

    $container['TasksModel'] = new TasksModelFactory;
    
    $container['IndexController'] = new IndexControllerFactory;
    $container['AddTaskController'] = new AddTaskControllerFactory;
    $container['CompleteTaskController'] = new CompleteTaskControllerFactory;
    $container['DeleteTaskController'] = new DeleteTaskControllerFactory;

};
