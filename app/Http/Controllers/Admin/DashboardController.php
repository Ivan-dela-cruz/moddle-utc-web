<?php

namespace App\Http\Controllers\Admin;

use App\File;
use App\Http\Controllers\Controller;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class DashboardController extends Controller
{

    public function index()
    {
        return view('admin.dashboard.index');
    }

    public function roles(Request $request)
    {
        return view('admin.dashboard.roles.index');
    }


    public function users()
    {
        return view('admin.dashboard.users.index');
    }

    public function subjects()
    {
        return view('admin.dashboard.subjects.index');
    }


    public function periods()
    {
        return view('admin.dashboard.periods.index');
    }


    public function courses()
    {
        return view('admin.dashboard.courses.index');
    }


    public function students()
    {
        return view('admin.dashboard.students.index');
    }

    public function teachers()
    {
        return view('admin.dashboard.teachers.index');
    }

    public function levels()
    {
        return view('admin.dashboard.levels.index');

    }

    public function tasks()
    {
        return view('admin.dashboard.tasks.index');

    }

    public function files()
    {
        return view('admin.dashboard.file.index');

    }

    public function practices()
    {
        return view('admin.dashboard.practices.index');

    }

    public function cs_activities()
    {
        return view('admin.dashboard.cs_activities.index');

    }

    //MATRICULAR UN STUDIANTE EN UN nivel
    public function periodsStudent()
    {
        return view('admin.dashboard.periods_sudents.index');

    }


    public function detailByCourses()
    {
        return view('admin.dashboard.detail-course.index');

    }
    //MATRICULAR UN STUDIANTE EN UN CURSO
    public function courseStudent()
    {
        return view('admin.dashboard.course_sudents.index');

    }

    public function fileStore(Request $request)
    {
        $task = Task::find($request->task_id);

        $file = $request->file('file');
        $size = $request->file('file')->getSize();
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('files/tasks/'), $fileName);

          $fileUpload = new File([
            'name'=> $request->name,
             'filename'=> $fileName,
             'size_file' => $size,
              'url_file' => 'files/tasks/'.$fileName
          ]);
          $task->files()->save($fileUpload);

        return response()->json(['name' => $request->name, 'filename' => $fileName, 'filesize' => $size]);
    }

    public function fileDestroy(Request $request)
    {
        $filename =  $request->get('filename');
        File::where('filename',$filename)->delete();
        $path=public_path('files/tasks/'.$filename);
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }

    public function fileLoad(Request $request){
        if($request->ajax()){
            $task = Task::find($request->task_id);
            return response()->json($task->files);
        }

    }
}
