<?php

namespace App\Controllers;
use App\Models\TasksModel;
use Slim\Views\PhpRenderer;

class IncompleteTaskController
{
    private PhpRenderer $renderer;
    private TasksModel $model;

    public function __construct(TasksModel $model, PhpRenderer $renderer)
    {
        $this->model = $model;
        $this->renderer = $renderer;
    }

    public function __invoke($request, $response)
    {
        $formData = $request->getParsedBody();
        $this->model->completeTask($formData['complete']);
        return $response->withHeader('Location', '/')->withStatus(301);
    }

}