<?php

namespace App\Http\Livewire;
use App\Course;
use App\Task;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
class DetailCourse extends Component
{
    use WithFileUploads;
    //VARIABLES DE ESTUDIANTES
    public  $levels,$subjects,$teachers,$periods, $name,$description,$career='' ,$url_image,$content,$status = true, $data_id;

    //VARIABLES PARA LAS TAREAS
    public  $title_t,$description_t,$url_image_t, $start_date_t, $end_date_t, $hour_t, $action_t, $course_id_t = null;

    //public $tasks;
    //VARIABLES DEL SELECT
    public $period_id,$level_id,$subject_id,$parallel="A", $action = 'POST';

    //variables para estudiantes metirulados en una materia
    public $students = [];

    private $teacher_id = null;

    public $course_id, $course;

    ///VARIABLE CNTROL TABS
    public $position = 'detail_c', $task_title = 'Nueva', $task_id;

    public function mount(Request $request)
    {
        $this->course_id = request()->query('course');
        $this->course = Course::find($this->course_id);
    }

    public function render()
    {
        $tasks = Task::where('course_id',$this->course_id)->get();
        return view('livewire.detail-course', compact('tasks'));
    }
    public function loadDataDetail($id)
    {
        $this->course = Course::find($id);
        $this->position = 'detail_c';
        $this->cancelUpdate();
    }
    public function loadDataTask($id)
    {
        $this->course = Course::find($id);
        $this->position = 'task_c';
        $this->cancelUpdate();
    }
    public function loadNewTask($id)
    {
        $this->course = Course::find($id);
        $this->position = 'new_task';
        $this->cancelUpdate();
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
        $this->position = 'update_c';
        $this->cancelUpdate();

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
               // 'period_id' => 'required',
                //'level_id' => 'required',
                //'subject_id' => 'required',
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
                //'academic_period_id'=> $this->period_id,
                //'level_id'=> $this->level_id,
                //'subject_id'=> $this->subject_id,
            ]);

            $this->alert('success', 'Curso actualizada con exíto.',[ 'showCancelButton' =>  false, ]);
            $this->edit($this->data_id);

        }else{
            $this->alert('warning', 'Su usuario no esta registrado como profesor.',[ 'showCancelButton' =>  false, ]);
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
        //$this->emit('taskHide');
        $this->task_title = 'Nueva';

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
            //    'url_image_t' => 'required|image',
                'start_date_t' => 'required',
                'end_date_t' => 'required',
                'hour_t' => 'required',
            ],[
                'title_t.required' => 'Campo obligatorio.',
                'description_t.required' => 'Campo obligatorio.',
                'start_date_t.required' => 'Campo obligatorio.',
                'end_date_t.required' => 'Campo obligatorio.',
                'hour_t.required' => 'Campo obligatorio.',
                'course_id_t.required' => 'Campo obligatorio.',
            ]);

           // $name = "file-" . time() . '.' .  $this->url_image_t->getClientOriginalExtension();
            //$path =  $this->url_image_t->storeAs('/',$name,'tasks');

            $data =  [
                'name'=>$this->title_t,
                'description'=>$this->description_t,
                'start_date'=> $this->start_date_t,
                'end_date'=> $this->end_date_t,
                'end_time'=> $this->hour_t,
               // 'url_image'=> 'tasks/'.$path,
                'course_id'=>  $this->course->id ,
            ];

            $task = Task::create($data);
            $this->emit('changeBtn');
            //$this->alert('success', 'Tarea creada con exíto.',[ 'showCancelButton' =>  false, ]);
            $this->dispatchBrowserEvent('data', ['task_id' => $task->id]);
            $this->resetInputFieldsTask();
           // $this->position = 'task_c';
        }else{
            $this->alert('warning', 'Su usuario no esta registrado como profesor.',[ 'showCancelButton' =>  false, ]);
        }
    }

    public function finalizeTask(){
        $this->emit('taskHide');
        $this->alert('success', 'Tarea creada con exíto.',[ 'showCancelButton' =>  false, ]);
    }

    public function  editTask($id){
        $task = Task::find($id);
        $this->task_id = $task->id;
        $this->emit('loadData', $task->id);
        $this->dispatchBrowserEvent('data', ['task_id' => $task->id]);
        $this->task_title = 'Editar';
        $this->position = 'new_task';
        $this->title_t = $task->name;
        $this->description_t = $task->description;
        $this->start_date_t = $task->start_date->format('Y-m-d');
        $this->end_date_t = $task->end_date->format('Y-m-d');
        $this->hour_t = $task->end_time->format('H:i');
    }
    public function updateTask(){
        $teacher = Auth::user()->teacher;
        if($teacher){
            $this->teacher_id = $teacher->id;
        }
        if(!is_null($this->teacher_id)){
            $validation = $this->validate([
                'title_t'	=>	'required',
                'description_t' => 'required',
                'start_date_t' => 'required',
                'end_date_t' => 'required',
                'hour_t' => 'required',
            ],[
                'title_t.required' => 'Campo obligatorio.',
                'description_t.required' => 'Campo obligatorio.',
                'start_date_t.required' => 'Campo obligatorio.',
                'end_date_t.required' => 'Campo obligatorio.',
                'hour_t.required' => 'Campo obligatorio.',
                'course_id_t.required' => 'Campo obligatorio.',
            ]);

            $task = Task::find($this->task_id);
            $task->update([
                'name'=>$this->title_t,
                'description'=>$this->description_t,
                'start_date'=> $this->start_date_t,
                'end_date'=> $this->end_date_t,
                'end_time'=> $this->hour_t,
                'course_id'=>  $this->course->id ,
            ]);

            $this->resetInputFieldsTask();
            $this->emit('updateData');
            $this->task_title = 'Nueva';
            $this->position = 'task_c';
            $this->alert('success', 'Tarea actualizada con exito.',[ 'showCancelButton' =>  false, ]);
        }else{
            $this->alert('warning', 'Su usuario no esta registrado como profesor.',[ 'showCancelButton' =>  false, ]);
        }

    }

    public function cancelUpdate(){
        $this->resetInputFieldsTask();
        $this->emit('updateData');
    }

    public function updateTaskStatus($id, $status){
        $task = Task::find($id);
        $task->update([
           'status' => $status
        ]);
        $this->alert('success', $status,[ 'showCancelButton' =>  false, ]);
        $this->position = 'task_c';
    }


}
