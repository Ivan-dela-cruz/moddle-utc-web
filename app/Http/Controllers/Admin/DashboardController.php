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
        //
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
        //
    }

  
    public function students()
    {
        return view('admin.dashboard.students.index');
    }
     public function teachers()
    {
        //
    }
}
