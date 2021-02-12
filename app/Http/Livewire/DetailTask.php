<?php

namespace App\Http\Livewire;

use App\Course;
use App\Task;
use App\Student;
use App\StudentTask;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DetailTask extends Component
{
    use WithFileUploads;
    //VARIABLES DE ESTUDIANTES
    public   $data_id;

    //VARIABLES PARA LAS ENTREGA DE TAREAS
    public  $description_t, $action_t, $course_id_t = null, $status_t;

    //public $tasks;
    //VARIABLES DEL SELECT
    public  $action = 'POST';

    //variables para estudiantes metirulados en una materia
    public $student;

    private $student_id = null;

    public $course_id, $course;

    ///VARIABLE CNTROL TABS
    public $position = 'detail_c', $task_title = 'Nueva', $task_id, $task,$task_status = '';
    //VARIABLE FILTRO POR TIEMPOS
    public $time,$timeWhere = '';

    public function mount(Request $request)
    {
        $this->course_id = request()->query('course');
        $this->task_id = request()->query('task');
        $this->course = Course::find($this->course_id);
        $this->task = Task::find($this->task_id);
    }

    public function render()
    {
        $now = Carbon::now();
       
        switch($this->timeWhere){

            case 'day':
                $this->time = $now->day;
                $tasks = Task::where('course_id',$this->course_id)
                ->where(function ($query) {
                    $query->when($this->task_status != '', function ($q) {
                        $q->orWhere('status',$this->task_status);
                    });
                })
                ->whereDay('created_at',$this->time)
                ->orderBy('updated_at','desc')
                ->paginate(6);
                break;
            case 'yesterday':
                $now = Carbon::yesterday();
                $this->time = $now->day;
              
                $tasks = Task::where('course_id',$this->course_id)
                ->where(function ($query) {
                    $query->when($this->task_status != '', function ($q) {
                        $q->orWhere('status',$this->task_status);
                    });
                })
                ->whereDay('created_at',$this->time)
                ->orderBy('updated_at','desc')
                ->paginate(6);
                break;
            case 'week':
                $this->time = $now->startOfWeek()->format('Y-m-d');
                $tasks = Task::where('course_id',$this->course_id)
                ->where(function ($query) {
                    $query->when($this->task_status != '', function ($q) {
                        $q->orWhere('status',$this->task_status);
                    });
                })
                ->whereBetween('created_at',[Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->orderBy('updated_at','desc')
                ->paginate(6);
                break;
            case 'month':
                $this->time = $now->month;
                $tasks = Task::where('course_id',$this->course_id)
                ->where(function ($query) {
                    $query->when($this->task_status != '', function ($q) {
                        $q->orWhere('status',$this->task_status);
                    });
                })
                ->whereMonth('created_at',$this->time)
                ->orderBy('updated_at','desc')
                ->paginate(6);
                break;
            case 'year':
                $this->time = $now->year;
                $tasks = Task::where('course_id',$this->course_id)
                ->where(function ($query) {
                    $query->when($this->task_status != '', function ($q) {
                        $q->orWhere('status',$this->task_status);
                    });
                })
                ->whereYear('created_at',$this->time)
                ->orderBy('updated_at','desc')
                ->paginate(6);
                break;
            case '':
                $this->time = "";
                $tasks = Task::where('course_id',$this->course_id)
                ->where(function ($query) {
                    $query->when($this->task_status != '', function ($q) {
                        $q->orWhere('status',$this->task_status);
                    });
                })
                ->orderBy('updated_at','desc')
                ->paginate(6);
                break; 
        }

        return view('livewire.detail-task', compact('tasks'));
    }

    public function getTime($time)
    {
        $this->timeWhere =  $time;
    }

    public function filterByStatus($status){
        $this->task_status = $status;
    }



    public function loadDataDetail($id)
    {
        $this->task = Task::find($id);
        $this->position = 'detail_c';
        $this->cancelUpdate();
       
    }
    public function loadDataTask($id)
    {
        $this->task = Task::find($id);
        $this->position = 'task_c';
        $this->cancelUpdate();
      
    }
    public function loadNewTask($id)
    {

        $this->task = Task::find($id);
        $this->position = 'new_task';
        $this->cancelUpdate();
      
    }
  

    public function resetInputFieldsTask()
    {
       
        $this->description_t = "";
        $this->action_t = "";
        $this->course_id_t = "";
        $this->status_id = "";
        //$this->emit('taskHide');
        $this->task_title = 'Nueva';

    }



    public function storeTask()
    {
        $student = Auth::user()->student;
        if($student){
            $this->student_id = $student->id;
        }
        if(!is_null($this->student_id)){
           
            $data =  [
                'description'=>$this->description_t,
                'student_id'=> $this->student_id,
                'task_id'=> $this->task_id,
                'course_id'=>  $this->course->id 
            ];

            $task = StudentTask::create($data);
            $this->emit('changeBtn');
            $this->dispatchBrowserEvent('data', ['task_id' => $task->id]);

            //VALIDAR HORA DE ENTREGA
            $endtimes = Carbon::parse($this->task->end_time);
            $enddates = Carbon::parse($this->task->end_date);
            $final_date =  Carbon::parse($enddates->format('Y-m-d')." ".$endtimes->format('H:i:s'));

            $this->task->status = $final_date->isPast() ?"Atrasado":"Finalizado";
            $this->task->save();
           
            $this->resetInputFieldsTask();
        }else{
            $this->alert('warning', 'Su usuario no esta registrado como estudiante.',[ 'showCancelButton' =>  false, ]);
        }
    }

    public function finalizeTask(){
         //VALIDAR HORA DE ENTREGA
        $endtimes = Carbon::parse($this->task->end_time);
        $enddates = Carbon::parse($this->task->end_date);
        $final_date =  Carbon::parse($enddates->format('Y-m-d')." ".$endtimes->format('H:i:s'));


        $this->task->status = $final_date->isPast() ?"Atrasado":"Finalizado";
        $this->task->save();
        $this->task = Task::find($this->task_id);
        $this->emit('taskHide');
        $this->alert('success', 'Tarea creada con exíto.',[ 'showCancelButton' =>  false, ]);

        $this->position = 'detail_c';
        $this->cancelUpdate();
    }   

    public function cancelUpdate(){
        $this->resetInputFieldsTask();
        $this->emit('updateData');
    }

   
}
