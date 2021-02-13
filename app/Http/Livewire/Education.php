<?php

namespace App\Http\Livewire;

use App\Education as EducationModel;
use App\Level;
use App\Period;
use App\Subject;
use App\Task;
use App\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Education extends Component
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

    private $user_id = null;

    public $task_id;

    public function render()
    {
        $this->user_id = Auth::user()->id;
        

        $this->periods = Period::where('status',1)->get();
        $this->levels = Level::where('status',1)->get();
        $this->SubjectsByLevel();
        $education = EducationModel::where('subject_id',$this->subject_id)
            ->where('academic_period_id',$this->period_id)
            ->where('level_id',$this->level_id)
            ->where('user_id',$this->user_id)
            ->paginate(2);


       /* if(count($courses)==0){
            $this->course_id_t = '';
        }
        $this->tasks = Task::where('course_id',$this->course_id_t)->get();*/

        //paar quitar
        $this->teachers = Teacher::all();
        $this->emit('startEditor');

        if(count($this->getErrorBag()->all()) > 0){
            //   dd($this->getErrorBag()->getMessages());
            $this->emit('errors',$this->getErrorBag()->all());
        }
        return view('livewire.education', compact('education'));
    }

    public function SubjectsByLevel()
    {
        $this->subjects = Subject::where('level_id',$this->level_id)->get();
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->description = '';
        $this->career = '';
        $this->url_image = '';
        $this->content = '';
        $this->status = true;
        //    $this->action = 'POST';
    }

    public function create(){
        $this->resetInputFields();

        $this->emit('cleanSummer');
    }

    public function store(){
        $this->user_id = Auth::user()->id;
        
        if(!is_null($this->user_id)){
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
                'user_id'=>$this->user_id,
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

            EducationModel::create($data);
            $this->alert('success', 'Noticia creado con exíto.',[ 'showCancelButton' =>  false, ]);
            $this->resetInputFields();
            $this->emit('courseStore');
        }else{
            $this->emit('courseStore');
            $this->alert('warning', 'Su usuario no esta registrado.',[ 'showCancelButton' =>  false, ]);
        }

    }

    public function edit($id)
    {
        $data = EducationModel::findOrFail($id);
        $this->name = $data->name;
        $this->description = $data->description;
        $this->career = $data->career;
        $this->url_image = $data->url_image;
        $this->content = $data->content;
        $this->status = $data->status;
        $this->user_id = $data->user_id;
        $this->academic_period_id = $data->academic_period_id;
        $this->level_id = $data->level_id;
        $this->subject_id = $data->subject_id;
        $this->data_id = $id;
        //  $this->action = 'PUT';
        $this->emit('loadData');
    }

    public function update( )
    {
        $this->user_id = Auth::user()->id;
       
        if(!is_null($this->user_id)){
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

            $data = EducationModel::find($this->data_id);
            if ($this->url_image != $data->url_image) {
                $this->validate(['url_image' => 'image'], ['url_image.image' => 'La imagen debe ser de formato: .jpg,.jpeg ó .png']);
                //save image
                $name = "file-" . time() . '.' . $this->url_image->getClientOriginalExtension();
                $path = 'courses/' . $this->url_image->storeAs('/', $name, 'courses');
            } else {
                $path = $data->url_image;
            }

            $data->update([
                'user_id'=>$this->user_id,
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
            $this->alert('warning', 'Su usuario no esta registrado.',[ 'showCancelButton' =>  false, ]);
        }
    }

    public function delete($id)
    {
        $course = EducationModel::find($id);
        if($course->tasks->count() <= 0){
            $course->delete();
            $this->alert('success', 'Noticia eliminada con exíto.',[ 'showCancelButton' =>  false, ]);
        }else{
            $this->alert('warning', 'No se puede eliminar el noticia.',[ 'showCancelButton' =>  false, ]);
        }
    }

}
