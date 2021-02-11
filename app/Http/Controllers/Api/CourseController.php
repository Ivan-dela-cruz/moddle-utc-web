<?php

namespace App\Http\Controllers\Api;

use App\PeriodStudent;
use App\Period;
use App\Student;
use App\Level;
use App\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index($id, $period_id)
    {
        $courses = Course::join('teachers', 'courses.teacher_id', '=', 'teachers.id')
            ->join('subjects', 'courses.subject_id', '=', 'subjects.id')
            ->select(
                'courses.id',
                'courses.name as title',
                'teachers.name',
                'teachers.last_name',
                'courses.description',
                'courses.url_image',
                'courses.teacher_id',
                'courses.subject_id',
                'courses.subject_id')
            ->where('courses.subject_id', $id)
            ->where('courses.academic_period_id', $period_id)
            ->where('courses.status', 1)
            ->orderBy('courses.name', 'ASC')
            ->get();

        return response()->json([
            'success' => true,
            'courses' => $courses,
            'status' => 200
        ], 200);
    }
}
