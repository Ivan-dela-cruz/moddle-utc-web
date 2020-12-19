<?php

namespace App\Http\Livewire;

use App\Task;
use Livewire\Component;

class Tasks extends Component
{
    public $tasks, $data_id,$name, $description,$start_date, $end_date, $url_file, $end_time, $status;
    
    public function render()
    {

        $this->tasks = Task::all();
        return view('livewire.tasks');
    }
    public function resetInputFields()
    {
    	$this->name = '';
    	$this->description = '';
        $this->start_date = '';
        $this->end_date = '';
        $this->url_file = '';
        $this->end_time = '';
        $this->status = '';
    }

    public function store()
    {
    	$validation = $this->validate([
    		'name'	=>	'required',
    		'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'url_file' => 'required',
            'end_time' => 'required',
            'status' => 'required'
        ]);

        $data =  [
            'name'=>$this->name,
            'description'=>$this->description,
            'start_date'=>$this->start_date,
            'end_date'=> $this->end_date,
            'url_file'=> $this->url_file,
            'end_time'=> $this->end_time,
            'status'=> $this->status
        ];
        Task::create($data);
        
        session()->flash('message', 'Tarea creada con exíto.');
        
    	$this->resetInputFields();

    	$this->emit('taskStore');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $this->name = $task->name;
    	$this->description = $task->description;
        $this->start_date = $task->start_date;
        $this->end_date = $task->end_date;
        $this->url_file = $task->url_file;
        $this->end_time = $task->end_time;
        $this->data_id = $id;
    }

    public function update()
    {
        $validation = $this->validate([
    		'name'	=>	'required',
    		'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'url_file' => 'required',
            'end_time' => 'required',
            'status' => 'required'
        ]);

        $data = Task::find($this->data_id);

        $data->update([
            'name'=>$this->name,
            'description'=>$this->description,
            'start_date'=> $this->start_date,
            'end_date'=> $this->end_date,
            'url_file'=> $this->url_file,
            'end_time'=> $this->end_time,
            'status'=> $this->status
        ]);

        session()->flash('message', 'Tarea actualizado con exíto.');

        $this->resetInputFields();

        $this->emit('taskStore');
    }

    public function delete($id)
    {
        Task::find($id)->delete();
        session()->flash('message', 'Tarea eliminado con exíto.');
    }
    
}
