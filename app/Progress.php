<?php

namespace App;

use App\Models\Project;

class Progress {
    public static function prog(Project $project){
        $tasks = $project->tasks;
        $count = 0;
        if (count($tasks) === 0) return 0;
        foreach ($tasks as $task) {
            if ($task->value == 'Completed') {
                $count++;
            }
        }
        return $count/count($tasks)*100;
    }
}