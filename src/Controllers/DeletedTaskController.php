<?php

namespace App\Controllers;
use App\Models\TasksModel;
use Slim\Views\PhpRenderer;
class DeletedTaskController
{
    private PhpRenderer $renderer;
    private Tasksmodel $model;

    public function __construct(Tasksmodel $model, PhpRenderer $renderer)
    {
        $this->model = $model;
        $this->renderer = $renderer;
    }

    public function __invoke($request, $response)
    {
        $formData = $request->getParsedBody();
        $this->model->deleteTask($formData['delete']);
        return $response->withHeader('Location', '/completedtasks')->withStatus(301);
    }
}