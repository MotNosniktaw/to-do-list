<?php

namespace Example\Controllers;

use Example\Models\TasksModel;
use Slim\Http\Request;
use Slim\Http\Response;

class GetTaskController
{
    protected $taskModel;

    public function __construct(TasksModel $taskModel)
    {
        $this->taskModel = $taskModel;
    }

    public function __invoke(Request $request, Response $response)
    {
        $data = [];
        $data['uncompleted'] = $this->taskModel->getUncompletedTasks();
        $data['completed'] = $this->taskModel->getCompletedTasks();
        var_dump($data);


        $response->withJSON($data);
    }

}