<?php

namespace App\Controllers;
use App\Models\TasksModel;
use Slim\Views\PhpRenderer;

class TasksController
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
      return $this->renderer->render($response, 'tasks.phtml',
      ['tasks'=>$this->model->getTasks()]);
  }

}