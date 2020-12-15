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

   
    public function users($id)
    {
        //
    }
    public function subjects()
    {
         return view('admin.dashboard.subjects.index');
    }

   
    public function periods($id)
    {
        //
    }

   
    public function courses(Request $request, $id)
    {
        //
    }

  
    public function students($id)
    {
        //
    }
     public function teachers($id)
    {
        //
    }
}
