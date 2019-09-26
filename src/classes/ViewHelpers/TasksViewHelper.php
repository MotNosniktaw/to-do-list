<?php

namespace Example\ViewHelpers;

class TasksViewHelper
{
    public static function displayUncompletedTasks($tasks)
    {
        $output = '';
        foreach($tasks as $task) {
            $output .= '<div class="list-item"><span>' . $task['task'] . '</span><button class="complete-button button" type=submit name="task-id" value="' . $task['id'] . '">Done</button></div>';
        }
        return $output;
    }

    public static function displayCompletedTasks($tasks)
    {
        $output = '';
        foreach($tasks as $task) {
            $output .= '<div class="list-item"><span>' . $task['task'] . '</span><button class="delete-button button" type=submit name="task-id" value="' . $task['id'] . '">Delete</button></div>';
        }
        return $output;
    }
}