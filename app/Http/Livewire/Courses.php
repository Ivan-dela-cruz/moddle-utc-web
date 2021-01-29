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
use phpDocumentor\Reflection\Types\This;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Courses extends Component
{
    use WithFileUploads;

   //VARIABLES DE ESTUDIANTES
    public  $courses ,$levels,$subjects,$teachers,$periods, $name,$description,$career='' ,$url_image,$content,$status = true, $data_id;

    //VARIABLES PARA LAS TAREAS
    public $tasks, $title_t,$description_t,$url_image_t, $start_date_t, $end_date_t, $hour_t, $action_t, $course_id_t = null;

    //VARIABLES DEL SELECT 
    public $period_id,$level_id,$subject_id,$parallel="A", $action = 'POST';


    //variables para estudiantes metirulados en una materia
    public $students = [];
   
    private $teacher_id = null;

    public function __construct()
    {
        $teacher = Auth::user()->teacher;
        if(!is_null($teacher)){
            $this->teacher_id = $teacher->id;
        }
    }

    public function render()
    {
        $this->periods = Period::where('status',1)->get();
        $this->levels = Level::where('status',1)->get();
        $this->SubjectsByLevel();
        $this->StudentsByCourse();
        $this->courses = Course::where('subject_id',$this->subject_id)
        ->where('academic_period_id',$this->period_id)
        ->where('level_id',$this->level_id)
        ->where('teacher_id',$this->teacher_id)
        ->get();

        if(count($this->courses)==0){
            $this->course_id_t = '';
        }
        $this->tasks = Task::where('course_id',$this->course_id_t)->get();
        
        //paar quitar
        $this->teachers = Teacher::all();
        $this->emit('startEditor');
       
        return view('livewire.courses');
    }
    public function SubjectsByLevel()
    {
        $this->subjects = Subject::where('level_id',$this->level_id)->get();
    }

    public function StudentsByCourse()
    {
        $this->students = DB::table('students')
            ->join('period_students', 'students.id', 'period_students.student_id')
            ->where('period_students.period_id', $this->period_id)
            ->where('period_students.level_id', $this->level_id)
            ->where('period_students.subject_id', $this->subject_id)
            ->where('period_students.status', $this->status)
            ->where('period_students.parallel', $this->parallel)
            ->select('students.*')
            ->get();
    }
    public function resetInputFields()
    {
    	$this->name = '';
    	$this->description = '';
        $this->career = '';
        $this->url_image = '';
        $this->content = '';
        $this->status = true;
        $this->action = 'POST';
    }

    public function store($content)
    { 
        if(!is_null($this->teacher_id)){
            $this->content = $content; 
            $validation = $this->validate([
                'name'	=>	'required',
                'description' => 'required',
                'url_image' => 'required',
                'content' => 'required',
                'status' => 'required',
                'period_id' => 'required',
                'teacher_id' => 'required',
                'level_id' => 'required',
                'subject_id' => 'required'
            ]);
            
           
            $name = "file-" . time() . '.' .  $this->url_image->getClientOriginalExtension();
            $path =  $this->url_image->storeAs('/',$name,'courses');
            $data =  [
                'teacher_id'=>$this->teacher_id,
                'name'=>$this->name,
                'description'=>$this->description,
                'career'=> $this->career,
                'url_image'=> 'courses/'.$path,
                'content'=> $this->content,
                'status'=> $this->status,
                'academic_period_id'=> $this->period_id,
                'level_id'=> $this->level_id,
                'subject_id'=> $this->subject_id,
            ];
        
            Course::create($data);
            $this->alert('success', 'Curso creado con exíto.');
            $this->resetInputFields();
            $this->emit('courseStore');
        }else{
            $this->emit('courseStore');
            $this->alert('warning', 'Su usuario no esta registrado como profesor.');
        }
        
    	
    }

    public function edit($id)
    {
        $data = Course::findOrFail($id);
        $this->name = $data->name;
        $this->description = $data->description;
        $this->career = $data->career;
        $this->url_image = $data->url_image;
        $this->content = $data->content;
        $this->status = $data->status;
        $this->teacher_id = $data->teacher_id;
        $this->academic_period_id = $data->academic_period_id;
        $this->level_id = $data->level_id;
        $this->subject_id = $data->subject_id;
        $this->data_id = $id;
        $this->action = 'PUT';
       
       
    }

    public function update( $content)
    {
        if(!is_null($this->teacher_id)){
            $this->content = $content;
        
            $validation = $this->validate([
                'name'	=>	'required',
                'description' => 'required',
                'url_image' => 'required',
                'content' => 'required',
                'status' => 'required',
                'teacher_id' => 'required',
                'period_id' => 'required',
                'level_id' => 'required',
                'subject_id' => 'required'
            ]);

            $data = Course::find($this->data_id);
            $name = "file-" . time() . '.' .  $this->url_image->getClientOriginalExtension();
            $path =  $this->url_image->storeAs('/',$name,'courses');

            $data->update([
                'teacher_id'=>$this->teacher_id,
                'name'=>$this->name,
                'description'=>$this->description,
                'career'=> $this->career,
                'url_image'=> 'courses/'.$path,
                'content'=> $this->content,
                'status'=> $this->status,
                'academic_period_id'=> $this->period_id,
                'level_id'=> $this->level_id,
                'subject_id'=> $this->subject_id,
            ]);

            $this->alert('success', 'Curso actualizada con exíto.');

            $this->resetInputFields();

            $this->emit('courseStore');
        }else{
            $this->emit('courseStore');
            $this->alert('warning', 'Su usuario no esta registrado como profesor.');
        }
    }

    public function delete($id)
    {
        Course::find($id)->delete();
        session()->flash('message', 'Curso eliminada con exíto.');
    }

    public function openformtask($id)
    {
        $this->course_id_t = $id;
        $this->emit('taskStore');
    }
    public function taskByCourse($id)
    {
        if($this->subject_id != ""){
            $this->course_id_t = $id;
        }else{
            $this->course_id_t = "";
        }
      
    }
    public function resetInputFieldsTask()
    {
        $this->title_t = "";
        $this->description_t = "";
        $this->url_image_t = ""; 
        $this->start_date_t = "";
        $this->end_date_t = ""; 
        $this->hour_t = ""; 
        $this->action_t = "";
        $this->course_id_t = "";
        $this->emit('taskHide');
    	
    }
    public function storeTask()
    { 
        if(!is_null($this->teacher_id)){
            $validation = $this->validate([
                'title_t'	=>	'required',
                'description_t' => 'required',
                'url_image_t' => 'required|image',
                'start_date_t' => 'required',
                'end_date_t' => 'required',
                'hour_t' => 'required',
                'course_id_t' => 'required',
            ]);

            $name = "file-" . time() . '.' .  $this->url_image_t->getClientOriginalExtension();
            $path =  $this->url_image_t->storeAs('/',$name,'tasks');

            $data =  [
                'name'=>$this->title_t,
                'description'=>$this->description_t,
                'start_date'=> $this->start_date_t,
                'end_date'=> $this->end_date_t,
                'end_time'=> $this->hour_t,
                'url_image'=> 'tasks/'.$path,
                'course_id'=>  $this->course_id_t ,
            ];
        
            Task::create($data);
            $this->alert('success', 'Tarea creada con exíto.');
            $this->resetInputFieldsTask();
            $this->emit('taskHide');
        }else{
            $this->alert('warning', 'Su usuario no esta registrado como profesor.');
        }
    }
}
