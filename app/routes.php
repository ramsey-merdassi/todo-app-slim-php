<?php
declare(strict_types=1);

use App\Controllers\TasksController;
use App\Controllers\AddTasksController;
use App\Controllers\IncompleteTaskController;
use App\Controllers\DisplayCompletedTasksController;
use App\Controllers\DeletedTaskcontroller;
use Slim\App;
use Slim\Views\PhpRenderer;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $container = $app->getContainer();

    //demo code - two ways of linking urls to functionality, either via anon function or linking to a controller

//    $app->get('/', function ($request, $response, $args) use ($container) {
//        $renderer = $container->get(PhpRenderer::class);
//        return $renderer->render($response, "index.php", $args);
//    });

//    $app->get('/courses', CoursesAPIController::class);

    $app->get('/', TasksController::class);
    $app->post('/addtasks', AddTasksController::class);
    $app->post('/completed', IncompleteTaskController::class);
    $app->get('/completedtasks', DisplayCompletedTasksController::class);
    $app->post('/deleted', DeletedTaskController::class);

//    $app->get('/completed');

};
