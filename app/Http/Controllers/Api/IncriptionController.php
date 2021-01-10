<?php

namespace App\Http\Controllers\Api;

use App\PeriodStudent;
use App\Period;
use App\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class IncriptionController extends Controller
{
    public function index(Request $request)
    {
        //$perids = Period::orderBy('start_date','DESC')->get();
       // $inscription = PeriodStudent::where('period_id',$period_first->id)->get();
        /*$periods = Student::join('period_students','period_students.student_id','=','students.id')
        ->join('academic_periods','period_students.period_id','=','academic_periods.id')
        ->select('students.id','academic_periods.id as period_id','academic_periods.name','academic_periods.start_date')
        ->where('students.id',1)
        ->get();*/

        $periods = DB::table('period_students')
        ->join('students','period_students.student_id','=','students.id')
        ->join('academic_periods','period_students.period_id','=','academic_periods.id')
        ->select(
            'students.id','academic_periods.id as period_id','academic_periods.name',
            'academic_periods.start_date',
            'academic_periods.end_date',
            'academic_periods.color',
            'academic_periods.url_image'
            )
        ->where('students.id',1)
        ->orderBy('academic_periods.start_date','DESC')
        ->get();

        $list = new Collection();
       
        foreach($periods as $k => $v){
            $p = $periods->where('period_id',$v->period_id);
            if(count($p)>1){
                unset($periods[$k]); 
            }
        }
        foreach($periods as $period){
          $item = [
              'id'=>$period->period_id,
              'name'=>$period->name,
              'start_date'=>$period->start_date,
              'end_date'=>$period->end_date,
              'url_image'=>$period->url_image,
              'color'=>$period->color,
              'status'=>true
          ];
          $list->push($item);
        }

        return response()->json([
            'success'=>true,
            'periods'=>$list,
            'status'=>200
        ],200);
    }
}
