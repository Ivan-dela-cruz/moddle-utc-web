<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Period;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class EducationController extends Controller
{
    public function education_list(){
        $period = Period::all();
        $education = \App\Education::where('academic_period_id',$period->last()->id)->get();

        $list = new Collection();

        foreach ($education as $edu){
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
}
