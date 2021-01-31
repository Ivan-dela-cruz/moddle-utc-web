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

class Courses extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

   //VARIABLES DE ESTUDIANTES
    public  $levels,$subjects,$teachers,$periods, $name,$description,$career='' ,$url_image,$content,$status = true, $data_id;

    //VARIABLES PARA LAS TAREAS
    public $tasks, $title_t,$description_t,$url_image_t, $start_date_t, $end_date_t, $hour_t, $action_t, $course_id_t = null;

    //VARIABLES DEL SELECT
    public $period_id,$level_id,$subject_id,$parallel="A", $action = 'POST';

    //variables para estudiantes metirulados en una materia
    public $students = [];

    private $teacher_id = null;

    public function render()
    {
        $teacher = Auth::user()->teacher;
        if($teacher){
            $this->teacher_id = $teacher->id;
        }

        $this->periods = Period::where('status',1)->get();
        $this->levels = Level::where('status',1)->get();
        $this->SubjectsByLevel();
        $this->StudentsByCourse();
        $courses = Course::where('subject_id',$this->subject_id)
        ->where('academic_period_id',$this->period_id)
        ->where('level_id',$this->level_id)
        ->where('teacher_id',$this->teacher_id)
        ->paginate(2);


        if(count($courses)==0){
            $this->course_id_t = '';
        }
        $this->tasks = Task::where('course_id',$this->course_id_t)->get();

        //paar quitar
        $this->teachers = Teacher::all();
        $this->emit('startEditor');

        return view('livewire.courses',compact('courses'));
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

    public function create(){
        $this->resetInputFields();
    }

    public function store(){
        $teacher = Auth::user()->teacher;
        if($teacher){
            $this->teacher_id = $teacher->id;
        }
        if(!is_null($this->teacher_id)){
            $validation = $this->validate([
                'name'	=>	'required',
                'description' => 'required',
                'content' => 'required',
                'status' => 'required',
                'period_id' => 'required',
                'level_id' => 'required',
                'subject_id' => 'required'
            ],[
                'name.required' => 'Campo obligatorio.',
                'description.required' => 'Campo obligatorio.',
                'content.required' => 'Campo obligatorio.',
                'status.required' => 'Campo obligatorio.',
                'period_id.required' => 'Seleccione un Periodo Academico.',
                'level_id.required' => 'Seleccione un Nivel.',
                'subject_id.required' => 'Seleccione una Materia.',
            ]);


            $path = 'img/user.jpg';
            if ($this->url_image != '') {
                $this->validate(['url_image' => 'image'], ['url_image.image' => 'La imagen debe ser de formato: .jpg,.jpeg ó .png']);
                //save image
                $name = "file-" . time() . '.' . $this->url_image->getClientOriginalExtension();
                $path = 'courses/' . $this->url_image->storeAs('/', $name, 'courses');
            }

            $data =  [
                'teacher_id'=>$this->teacher_id,
                'name'=>$this->name,
                'description'=>$this->description,
                'career'=> $this->career,
                'url_image'=> $path,
                'content'=> $this->content,
                'status'=> $this->status,
                'academic_period_id'=> $this->period_id,
                'level_id'=> $this->level_id,
                'subject_id'=> $this->subject_id,
            ];

            Course::create($data);
            $this->alert('success', 'Curso creado con exíto.',[ 'showCancelButton' =>  false, ]);
            $this->resetInputFields();
            $this->emit('courseStore');
        }else{
            $this->emit('courseStore');
            $this->alert('warning', 'Su usuario no esta registrado como profesor.',[ 'showCancelButton' =>  false, ]);
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
      //  $this->action = 'PUT';
        $this->emit('loadData');
    }

    public function update( )
    {
        $teacher = Auth::user()->teacher;
        if($teacher){
            $this->teacher_id = $teacher->id;
        }
        if(!is_null($this->teacher_id)){
        //    $this->content = $content;

            $validation = $this->validate([
                'name'	=>	'required',
                'description' => 'required',
                'content' => 'required',
                'status' => 'required',
                'period_id' => 'required',
                'level_id' => 'required',
                'subject_id' => 'required',
            ],[
                'name.required' => 'Campo obligatorio.',
                'description.required' => 'Campo obligatorio.',
                'content.required' => 'Campo obligatorio.',
                'status.required' => 'Campo obligatorio.',
                'period_id.required' => 'Seleccione un Periodo Academico.',
                'level_id.required' => 'Seleccione un Nivel.',
                'subject_id.required' => 'Seleccione una Materia.',
            ]);

            $data = Course::find($this->data_id);
            if ($this->url_image != $data->url_image) {
                $this->validate(['url_image' => 'image'], ['url_image.image' => 'La imagen debe ser de formato: .jpg,.jpeg ó .png']);
                //save image
                $name = "file-" . time() . '.' . $this->url_image->getClientOriginalExtension();
                $path = 'courses/' . $this->url_image->storeAs('/', $name, 'courses');
            } else {
                $path = $data->url_image;
            }

            $data->update([
                'teacher_id'=>$this->teacher_id,
                'name'=>$this->name,
                'description'=>$this->description,
                'career'=> $this->career,
                'url_image'=> $path,
                'content'=> $this->content,
                'status'=> $this->status,
                'academic_period_id'=> $this->period_id,
                'level_id'=> $this->level_id,
                'subject_id'=> $this->subject_id,
            ]);

            $this->alert('success', 'Curso actualizada con exíto.',[ 'showCancelButton' =>  false, ]);

            $this->resetInputFields();

            $this->emit('courseStore');
        }else{
            $this->emit('courseStore');
            $this->alert('warning', 'Su usuario no esta registrado como profesor.',[ 'showCancelButton' =>  false, ]);
        }
    }

    public function delete($id)
    {
        $course = Course::find($id);
        if($course->tasks->count() <= 0){
            $course->delete();
            $this->alert('success', 'Curso eliminada con exíto.',[ 'showCancelButton' =>  false, ]);
        }else{
            $this->alert('warning', 'No se puede eliminar el curso.',[ 'showCancelButton' =>  false, ]);
        }

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
        $teacher = Auth::user()->teacher;
        if($teacher){
            $this->teacher_id = $teacher->id;
        }
        if(!is_null($this->teacher_id)){
            $validation = $this->validate([
                'title_t'	=>	'required',
                'description_t' => 'required',
                'url_image_t' => 'required|image',
                'start_date_t' => 'required',
                'end_date_t' => 'required',
                'hour_t' => 'required',
                'course_id_t' => 'required',
            ],[
                'title_t.required' => 'Campo obligatorio.',
                'description_t.required' => 'Campo obligatorio.',
                'start_date_t.required' => 'Campo obligatorio.',
                'end_date_t.required' => 'Campo obligatorio.',
                'hour_t.required' => 'Campo obligatorio.',
                'course_id_t.required' => 'Campo obligatorio.',
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
            $this->alert('success', 'Tarea creada con exíto.',[ 'showCancelButton' =>  false, ]);
            $this->resetInputFieldsTask();
            $this->emit('taskHide');
        }else{
            $this->alert('warning', 'Su usuario no esta registrado como profesor.',[ 'showCancelButton' =>  false, ]);
        }
    }
}
