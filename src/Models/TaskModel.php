<?php
require_once 'src/Entities/TaskEntity.php';
class TaskModel
{
    private PDO $db;
    public function __construct(PDO $db)
    {
        $this->db = $db;

    }
    /**
     * @return TaskEntity []
     *
     */
    public function getTasks(): array
    {
        $query = $this->db->prepare("SELECT `tasks`.`name` AS 'taskname', `estimate`
                                            FROM `tasks` INNER JOIN `project_users` 
                                            ON `tasks`.`user_id` = `project_users`.`user_id`;");
        $query->setFetchMode(PDO::FETCH_CLASS, TaskEntity::class);
        $query->execute();
        return $query->fetchAll();
        //query3
    }

    public function getTaskPreview(): array
    {
        $query = $this->db->prepare('SELECT `tasks`.`name` AS `taskname`, `estimate`
                                            FROM `tasks` INNER JOIN `project_users` 
                                            ON `tasks`.`user_id` = `project_users`.`user_id`;');
        $query->setFetchMode(PDO::FETCH_CLASS, TaskEntity::class);
        $query->execute();
        return $query->fetchAll();

    }
}