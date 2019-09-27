<?php

namespace Example\Models;

class TasksModel
{
    protected $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getUncompletedTasks()
    {
        $sql = 'SELECT `id`, `task` FROM `tasks` WHERE `completed` = 0 AND `deleted` = 0;';
        $query = $this->db->query($sql);
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getCompletedTasks()
    {
        $sql = 'SELECT `id`, `task` FROM `tasks` WHERE `completed` = 1 AND `deleted` = 0;';
        $query = $this->db->query($sql);
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function addNewTask($data)
    {
        $newTask = $data['new-task'];

        $sql = $this->db->prepare('INSERT INTO `tasks` (`completed`, `deleted`, `task`) VALUES (0, 0, :newTask);');
        $sql->bindParam('newTask', $newTask, \PDO::PARAM_STR);
        $sql->execute();
        return true;
    }

    public function updateCompletedTasks($data)
    {
        $taskID = $data['task-id'];

        $sql = $this->db->prepare('UPDATE `tasks` SET `completed` = 1 WHERE `id` = :taskID AND `completed` = 0;');
        $sql->bindParam('taskID', $taskID, \PDO::PARAM_STR);
        $sql->execute();
        return true;
    }

    public function deleteCompletedTasks($data)
    {
        $taskID = $data['task-id'];

        $sql = $this->db->prepare('UPDATE `tasks` SET `deleted` = 1 WHERE `id` = :taskID AND `completed` = 1;');
        $sql->bindParam('taskID', $taskID, \PDO::PARAM_STR);
        $sql->execute();
        return true;
    }
}