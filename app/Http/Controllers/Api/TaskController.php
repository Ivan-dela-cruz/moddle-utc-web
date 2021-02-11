<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class TaskController extends Controller
{
    public function tasks($course_id, $status)
    {
        $tasks = Task::where('course_id', $course_id)
            ->where('status', $status)->get();

        $list = new Collection();
        foreach ($tasks as $task) {
            $files = $task->files->count();
            $course_image = $task->Course->url_image;
            $item = [
                'id' => $task->id,
                'name' => $task->name,
                'description' => $task->description,
                'start_date' => $task->start_date->format("M d/Y"),
                'end_date' => $task->end_date->format("M d/Y"),
                'url_file' => $task->url_file,
                'end_time' => $task->end_time->format('H:m:i a'),
                'status' => $task->status,
                'course_id' => $task->course_id,
                'files' => $files
            ];
            $list->push($item);
        }

        return response()->json([
            'success' => true,
            'tasks' => $list,
            'status' => 200
        ], 200);
    }

    public function detailTask($task_id)
    {
        $task = Task::find($task_id);

        return response()->json([
            'success' => true,
            'files' =>  $task->files,
            'status' => 200
        ], 200);
    }


}
