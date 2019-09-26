<?php

namespace Example\Controllers;

use Example\Models\TasksModel;
use Example\Validators\TaskFormValidator;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\PhpRenderer;

class DeleteTaskController
{
    protected $renderer;

    protected $tasksModel;

    public function __construct(PhpRenderer $renderer, TasksModel $tasksModel)
    {
        $this->renderer = $renderer;
        $this->tasksModel = $tasksModel;
    }

    public function __invoke(Request $request, Response $response)
    {
        $post = $request->getParsedBody();

        $deleteTaskCheck = TaskFormValidator::validateTaskID($post);
        if ($deleteTaskCheck) {
            $this->tasksModel->deleteCompletedTasks($post);
        } else {
            echo "this should not have happened!";
        }

        // $this->renderer->render($response, 'deleteTask.phtml');

        // return $response->withRedirect('/');

        return $response->withJSON(['success' => true]);

    }
}