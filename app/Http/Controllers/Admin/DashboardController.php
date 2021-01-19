<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    //MATRICULAR UN STUDIANTE EN UN nivel
    public function periodsStudent()
    {
        return view('admin.dashboard.periods_sudents.index');

    }
     //MATRICULAR UN STUDIANTE EN UN CURSO
     public function courseStudent()
     {
         return view('admin.dashboard.course_sudents.index');

     }
}
