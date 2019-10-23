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
        $uncompleted = $this->taskModel->getUncompletedTasks();
        $completed = $this->taskModel->getCompletedTasks();
        $data['uncompleted'] = $uncompleted;
        $data['completed'] = $completed;

        return $response->withJSON($data);
    }

}