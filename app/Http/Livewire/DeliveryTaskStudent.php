<?php

namespace App\Http\Livewire;

use App\Task;
use App\Course;
use App\StudentTask;
use App\Rules\ValidNote;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Str;
class DeliveryTaskStudent extends Component
{
    public $course_id, $course;

    ///VARIABLE CNTROL TABS
    public $position = 'detail_c', $task_title = 'Nueva', $task_id, $task,$task_status = '';
    //VARIABLE FILTRO POR TIEMPOS
    public $time,$timeWhere = '',$note_new = 0;

    public $delivery_select = null;
    public function mount(Request $request)
    {
        $this->course_id = request()->query('course');
        $this->task_id = request()->query('task');
        $this->course = Course::find($this->course_id);
        $this->task = Task::find($this->task_id);
    }

    public function render()
    {
        return view('livewire.delivery-task-student');
    }


    public function saveNote($id)
    {
        $validation = $this->validate([
            'note_new' => ['required','regex:/^[0-9]+/',new ValidNote]
        ], [
            'note_new.required' => 'La nota es obligatoria.',
            'note_new.regex' => 'La nota debe ser entre 0 y 10.',
        ]);

        $delivery = StudentTask::find($id);
     
        $delivery->note = $this->note_new;
        $delivery->save();
        $this->alert('success', 'Nota actualizada con exíto.',[ 'showCancelButton' =>  false, ]);
    }
    public function selectDelivery($id)
    {
        $this->delivery_select = StudentTask::find($id);
        $this->note_new =  $this->delivery_select->note;
    }
    public function getIcon($file)
    {
        $ext = Str::after($file, '.');
        $ext = Str::upper($ext);
        if($ext == 'PNG' || $ext == 'JPG' || $ext == 'JEPG' || $ext == 'GIF' || $ext == 'ICON' || $ext == 'BMP'){
            return 'text-warning fas fa-file-image fa-2x';
        }elseif($ext == 'DOC' || $ext == 'DOCX' || $ext == 'TXT' || $ext == 'DOCM' || $ext == 'DOTX' || $ext == 'DOCTM'){
            return 'text-info fas fa-file-word fa-2x';
        }elseif($ext == 'XLSX' || $ext == 'XLS' || $ext == 'XLSM' || $ext == 'CVS' || $ext == 'XLTX' || $ext == 'ODS'|| $ext == 'OTS'){
            return 'text-success fas fa-file-excel fa-2x';
        }elseif($ext == 'PDF' ){
            return 'text-danger fas fa-file-pdf fa-2x';
        }else{
            return 'text-muted fas fa-file-archive fa-2x';
        }
    }
    public function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
    }
}
