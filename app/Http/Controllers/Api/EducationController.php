<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function education_list(){
        $education = \App\Education::all();
        return response()->json([
            'success' => true,
            'education' => $education,
            'status' => 200
        ], 200);
    }
}
