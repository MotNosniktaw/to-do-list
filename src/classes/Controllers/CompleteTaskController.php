<?php

namespace Example\Controllers;

use Slim\Views\PhpRenderer;
use Example\Models\TasksModel;
use Example\Validators\TaskFormValidator;
use Slim\Http\Request;
use Slim\Http\Response;

class CompleteTaskController
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

        $updateTaskCheck = TaskFormValidator::validateTaskID($post);
        if ($updateTaskCheck) {
            $this->tasksModel->updateCompletedTasks($post);
        } else {
            // echo "this should not have happened!";
        }

        // $this->renderer->render($response, 'completeTask.phtml');

        // return $response->withRedirect('/');

        return $response->withJSON(['success' => true]);
    }

}