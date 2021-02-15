<?php

namespace App\Http\Controllers\Api;

use App\Course;
use App\File;
use App\Http\Controllers\Controller;
use App\Period;
use App\PeriodStudent;
use App\StudentTask;
use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TaskController extends Controller
{
    public function tasks($course_id, $status)
    {
        $tasks = Task::where('course_id', $course_id)
            ->where('status', $status)->get();

        $list = new Collection();
        foreach ($tasks as $task) {

            $d = $task->taskdeliveries->where('student_id', Auth::user()->student->id);

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
                'deliveries' => $d->count(),
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

        $d = $task->taskdeliveries->where('student_id', Auth::user()->student->id);

        foreach ($d as $deliveries) {
            $files = $deliveries->files;
        }
        // dd($files);

        return response()->json([
            'success' => true,
            'files' => $task->files,
            'files_deliveries' => $d->count() > 0 ? $files : null,
            'status' => 200
        ], 200);
    }

    public function deliveryTask(Request $request)
    {
        $student = Auth::user()->student;
        $size = $_FILES['files1']['size'];
        $target1 = basename($_FILES['files1']['name']);
        $filename = time() . ' - ' . $target1;
        $filepath = public_path('files/deliveries/');

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
            'url_file' => 'files/deliveries/' . $filename
        ]);
        $studentTask->files()->save($fileUpload);

        /*  $task = Task::find($request->task_id);
          $task->update([
             'status' => 'Finalizado'
          ]);*/

        move_uploaded_file($_FILES['files1']['tmp_name'], $filepath . $filename);


        return response()->json([
            'success' => true,
            'delivery_files' => $studentTask->files,
            'status' => 200
        ], 200);


    }

    public function taskToday()
    {
        $day = Carbon::now('America/Guayaquil');

        $period = Period::all();
        $student_id = Auth::user()->student->id;
        $period_id = $period->last()->id;

        //    $courses = Course::where('academic_period_id',$period_id)->get();
        $ps = PeriodStudent::where('period_id', $period_id)
            ->where('student_id', $student_id)
            ->get();

        $list = new Collection();
        foreach ($ps as $p) {
            $courses = Course::where('academic_period_id', $p->period_id)
                ->where('subject_id', $p->subject_id)
                ->get();
            foreach ($courses as $course) {
                foreach ($course->tasks as $task) {
                    $d = $task->taskdeliveries->where('student_id', Auth::user()->student->id);
                    $files = $task->files->count();
                    $item = [
                        'id' => $task->id,
                        'name' => $task->name,
                        'description' => $task->description,
                        'start_date' => $task->start_date->format("M d/Y"),
                        'end_date' => $task->end_date->format("Y-m-d"),
                        'url_file' => $task->url_file,
                        'end_time' => $task->end_time->format('H:m:i a'),
                        'status' => $task->status,
                        'course_id' => $task->course_id,
                        'deliveries' => $d->count(),
                        'files' => $files
                    ];
                    $list->push($item);
                }
            }
        }
        $newList = $list->where('end_date',$day->format("Y-m-d"));

        $list2 = new Collection();

        foreach ($newList as $k => $v){
            $item1 = [
              'id' => $v['id'],
              'name' => $v['name'],
              'description' => $v['description'],
              'start_date' => $v['start_date'],
              'end_date' => $v['end_date'],
              'url_file' => $v['url_file'],
              'end_time' => $v['end_time'],
              'status' => $v['status'],
              'course_id' => $v['course_id'],
              'deliveries' => $v['deliveries'],
              'files' => $v['files'],
            ];
            $list2->push($item1);
        }

        return response()->json([
            'success' => true,
            'tasks' => $list2,
            'status' => 200
        ], 200);

    }


}
