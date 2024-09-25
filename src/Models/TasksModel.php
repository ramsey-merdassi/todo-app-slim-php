<?php

namespace App\Models;
use PDO;

class TasksModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getTasks()
    {
        $query = $this->db->prepare("SELECT * FROM `tasks` WHERE `completed` = 0");
        $query->execute();
        return $query->fetchAll();
    }

    public function addTask($task)
    {
        $query = $this->db->prepare("INSERT INTO tasks (task) VALUES (:task)");
        $query->bindParam(':task', $task);
        $query->execute();
    }

    public function completeTask($completeTask)
    {
        $query = $this->db->prepare("UPDATE `tasks` SET `completed` = 1
         WHERE `id` = :completed");
        $query->bindParam(':completed', $completeTask);
        $query->execute();
    }

    public function getCompletedTasks()
    {
        $query = $this->db->prepare("SELECT * FROM `tasks` WHERE `completed` = 1");
        $query->execute();
        return $query->fetchAll();
    }

    public function deleteTask($deletedTask) {
        $query = $this->db->prepare("DELETE FROM `tasks` WHERE `id` = :deleted");
        $query->bindParam(':deleted', $deletedTask);
        $query->execute();
    }

}