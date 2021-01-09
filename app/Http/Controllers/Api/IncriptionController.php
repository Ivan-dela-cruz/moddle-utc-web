<?php

namespace App\Http\Controllers\Api;

use App\PeriodStudent;
use App\Period;
use App\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncriptionController extends Controller
{
    public function index(Request $request)
    {
        $period_first = Period::orderBy('start_date','DESC')->first();
        $inscription = PeriodStudent::where('period_id',$period_first->id)->get();
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
            'academic_periods.end_date'
            )
        ->where('students.id',1)
        ->orderBy('academic_periods.start_date','DESC')
        ->get();
       
        foreach($periods as $k => $v){
            $p = $periods->where('period_id',$v->period_id);
            if(count($p)>1){
                unset($periods[$k]); 
            }
        }

        return response()->json([
            'periods'=>$periods
        ]);
    }
}
