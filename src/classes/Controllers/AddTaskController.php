<?php 

namespace Example\Controllers;

use Example\Models\TasksModel;
use Example\Validators\TaskFormValidator;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\PhpRenderer;

class AddTaskController
{
    protected $renderer;
    protected $tasksModel;

    public function __construct(PhpRenderer $renderer,TasksModel $tasksModel)
    {
        $this->renderer = $renderer;
        $this->tasksModel = $tasksModel;
    }

    public function __invoke(Request $request, Response $response) 
    {
        $post = $request->getParsedBody();

        $newTaskCheck = TaskFormValidator::validateNewTask($post);
        if ($newTaskCheck) {
            $this->tasksModel->addNewTask($post);
        }

        // $this->renderer->render($response, 'addNewTask.phtml');

        return $response->withRedirect('/');
    }

}