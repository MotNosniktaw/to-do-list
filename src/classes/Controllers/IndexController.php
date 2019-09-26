<?php

namespace Example\Controllers;

use Example\Models\TasksModel;
use Example\Validators\TaskFormValidator;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\PhpRenderer;

class IndexController
{
    protected $renderer;
    protected $taskModel;

    public function __construct(PhpRenderer $renderer, TasksModel $taskModel)
    {
        $this->renderer = $renderer;
        $this->taskModel = $taskModel;
    }

    public function __invoke(Request $request, Response $response)
    {
        $post = $request->getParsedBody();

        $deleteTaskCheck = TaskFormValidator::validateTaskID($post);
        if ($deleteTaskCheck) {
            $this->taskModel->deleteCompletedTasks($post);
        }

        $completedTasks = [$this->taskModel->getCompletedTasks()];
        $uncompletedTasks = [$this->taskModel->getUncompletedTasks()];

        $this->renderer->render($response, 'index.phtml', ['completedTasks' => $completedTasks, 'uncompletedTasks' => $uncompletedTasks]);
    }
}