<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Period;
use App\PeriodStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class EducationController extends Controller
{
    public function education_list()
    {
        $period = Period::all();
        $education = \App\Education::where('academic_period_id', $period->last()->id)->get();

        $list = new Collection();

        foreach ($education as $edu) {
            $item = [
                'id' => $edu->id,
                'academic_period_id' => $edu->academic_period_id,
                'level_id' => $edu->level_id,
                'subject_id' => $edu->subject_id,
                'user_id' => $edu->user_id,
                'name' => $edu->name,
                'description' => $edu->description,
                'career' => $edu->career,
                'url_image' => $edu->url_image,
                'status' => $edu->status,
                'created_at' => $edu->created_at,
                'content' => '',
            ];
            $list->push($item);
        }

        return response()->json([
            'success' => true,
            'education' => $list,
            'status' => 200
        ], 200);
    }

    public function myLevels()
    {
        $student_id = Auth::user()->student->id;

        $periods = PeriodStudent::orderBy('level_id', 'DESC')
            ->groupBy("level_id")
            ->where('student_id', $student_id)
            ->get();
        $list = new Collection();
        foreach ($periods as $period){
                $item = [
                    'name' => $period->levels->name,
                    'student_id' => $period->student_id,
                    'level_id' => $period->level_id
                ];
                $list->push($item);

        }

        return response()->json([
            'success' => true,
            'levels' => $list,
            'status' => 200
        ], 200);
    }
}
