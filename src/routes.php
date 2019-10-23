<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/', 'IndexController');
    $app->post('/', 'IndexController');

    $app->get('/get-task', 'GetTaskController');
    $app->post('/add-task', 'AddTaskController');
    $app->post('/complete-task', 'CompleteTaskController');
    $app->post('/delete-task', 'DeleteTaskController');

};
