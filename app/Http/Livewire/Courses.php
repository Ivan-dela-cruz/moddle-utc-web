<?php

namespace App\Http\Livewire;

use App\Course;
use Livewire\Component;

class Courses extends Component
{
   
    public  $courses, $name,$start_date,$end_date,$status,$teacher_id,$period_level_subject_id, $data_id;
    
    public function render()
    {
    	$this->periods = Course::all();
    	
        return view('livewire.courses');
    }

    public function resetInputFields()
    {
    	$this->name = '';
    	$this->start_date = '';
        $this->end_date = '';
        $this->status = '';
        $this->teacher_id = '';
        $this->period_level_subject_id = '';
    }

    public function store()
    {
    	$validation = $this->validate([
    		'name'	=>	'required',
    		'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
            'teacher_id' => 'required',
            'period_level_subject_id' => 'required'
    	]);
    	Course::create($validation);
    	session()->flash('message', 'Curso creado con exíto.');
    	$this->resetInputFields();

    	$this->emit('courseStore');
    }

    public function edit($id)
    {
        $data = Course::findOrFail($id);
        $this->name = $data->name;
        $this->start_date = $data->start_date;
        $this->end_date = $data->end_date;
        $this->status = $data->status;
        $this->teacher_id = $data->teacher_id;
        $this->period_level_subject_id = $data->period_level_subject_id;
        $this->data_id = $id;
    }

    public function update()
    {
        $validation = $this->validate([
    		'name'	=>	'required',
    		'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
            'teacher_id' => 'required',
            'period_level_subject_id' => 'required'
    	]);

        $data = Course::find($this->data_id);

        $data->update([
            'name'       =>   $this->name,
            'start_date' =>  $this->start_date,
            'end_date'  =>  $this->end_date,
            'status' => $this->status,
            'teacher_id' => $this->teacher_id,
            'period_level_subject_id' => $this->period_level_subject_id
        ]);

        session()->flash('message', 'Curso actualizada con exíto.');

        $this->resetInputFields();

        $this->emit('courseStore');
    }

    public function delete($id)
    {
        Course::find($id)->delete();
        session()->flash('message', 'Curso eliminada con exíto.');
    }
}
