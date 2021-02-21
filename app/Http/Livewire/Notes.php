<?php

namespace App\Http\Livewire;

use App\Period;
use App\Level;
use App\Course;
use App\Teacher;
use App\Subject;
use App\Task;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use phpDocumentor\Reflection\Types\This;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Notes extends Component
{
     //VARIABLES DE ESTUDIANTES
     public  $levels,$subjects,$teachers,$periods, $name,$description,$career='' ,$url_image,$content,$status = true, $data_id;

     //VARIABLES PARA LAS TAREAS
     public $tasks, $title_t,$description_t,$url_image_t, $start_date_t, $end_date_t, $hour_t, $action_t, $course_id_t = null;
 
     //VARIABLES DEL SELECT
     public $period_id,$level_id,$subject_id,$parallel="A", $action = 'POST';
 
     //variables para estudiantes metirulados en una materia
     
 
     private $teacher_id = null;
 
     public $task_id;

    public function render()
    {
        $teacher = Auth::user()->teacher;
        if($teacher){
            $this->teacher_id = $teacher->id;
        }

        $this->periods = Period::where('status',1)->get();
        $this->levels = Level::where('status',1)->get();
        $this->SubjectsByLevel();
        
        $courses = Course::where('subject_id',$this->subject_id)
        ->where('academic_period_id',$this->period_id)
        ->where('level_id',$this->level_id)
        ->where('teacher_id',$this->teacher_id)
        ->get();

        if(count($courses)==0){
            $this->course_id_t = '';
        }
        $this->tasks = Task::where('course_id',$this->course_id_t)->get();

        
        return view('livewire.notes');
    }
    public function SubjectsByLevel()
    {
        $this->subjects = Subject::where('level_id',$this->level_id)->get();
    }
    public function StudentsBySubjects()
    {
       $lit  = DB::table('students')
            ->join('period_students', 'students.id', 'period_students.student_id')
            ->where('period_students.period_id', $this->period_id)
            ->where('period_students.level_id', $this->level_id)
            ->where('period_students.subject_id', $this->subject_id)
            ->where('period_students.status', 1)
            ->where('period_students.parallel', $this->parallel)
            ->select('students.*')
            ->get();
        $lista = new Collection();
            foreach($lit as $it){
                $item = [
                    'id'=>$it->id,
                    'name'=>$it->name." ".$it->last_name
                ];
                $lista->push($item);
            }
        return $lista;
          
    }
}
