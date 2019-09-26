<?php

namespace Example\Validators;

class TaskFormValidator
{
    public static function validateNewTask($data)
    {
        if (isset($data['new-task']) && !empty($data['new-task'])) {
            return true;
        } else {
            return false;
        }
    }

    public static function validateTaskID($data)
    {
        if (isset($data['task-id']) && !empty($data['task-id']) && is_numeric($data['task-id'])) {
            return true;
        } else {
            return false;
        }
    }
}