<?php

namespace App\Http\Controllers\Api;

use App\File;
use App\Http\Controllers\Controller;
use App\StudentTask;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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
                'deliveries' => $task->taskdeliveries->count(),
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
            'files' => $task->files,
            'status' => 200
        ], 200);
    }

    public function deliveryTask(Request $request)
    {
        $student = Auth::user()->student;
        $size = $_FILES['files1']['size'];
        $target1 = basename($_FILES['files1']['name']);
        $filename = time() . ' - ' . $target1;
        $filepath = public_path('tasks/delivery/');

        $studentTask = StudentTask::create([
            'description' => $request->description,
            'course_id' => $request->course_id,
            'student_id' => $student->id,
            'task_id' => $request->task_id,
        ]);

        $fileUpload = new File([
            'name' => $target1,
            'filename' => $filename,
            'size_file' => $size,
            'url_file' => 'tasks/delivery/' . $filename
        ]);
        $student->files()->save($fileUpload);

      /*  $task = Task::find($request->task_id);
        $task->update([
           'status' => 'Finalizado'
        ]);*/

        move_uploaded_file($_FILES['files1']['tmp_name'], $filepath . $filename);




        return response()->json([
            'success' => true,
            'delivery_files' => $student->files,
            'status' => 200
        ], 200);


    }


}
