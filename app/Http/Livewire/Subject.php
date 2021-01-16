<?php

namespace App\Http\Livewire;

use App\Subject as Subjects;
use Livewire\Component;
use App\Level;

class Subject extends Component
{
    public  $subjects,$levels, $name, $description, $slug, $status=1, $data_id,$level_id;

    public function render()
    {
        $this->levels = Level::all();
    	$this->subjects = Subjects::all();
    	
        return view('livewire.subject');
    }

    public function resetInputFields()
    {
    	$this->name = '';
    	$this->description = '';
        $this->slug = '';
        $this->status = '';
        $this->level_id = '';
    }

    public function store()
    {
    	$validation = $this->validate([
    		'name'	=>	'required',
    		'description' => 'required',
            'slug' => 'required',
            'status' => 'required',
            'level_id' => 'required'
            
    	]);
    	Subjects::create($validation);
    	session()->flash('message', 'Materia creada con exíto.');
    	$this->resetInputFields();

    	$this->emit('subjectStore');
    }

    public function edit($id)
    {
        $data = Subjects::findOrFail($id);
        $this->name = $data->name;
        $this->description = $data->description;
        $this->slug = $data->slug;
        $this->level_id = $data->level_id;
        $this->data_id = $id;
        $this->status = $data->status ;
    }

    public function update()
    {
        $validate = $this->validate([
            'name' => 'required',
            'description' => 'required',
            'slug' => 'required',
            'status' => 'required',
            'level_id' => 'required'
        ]);

        $data = Subjects::find($this->data_id);

        $data->update([
            'name'       =>   $this->name,
            'description'         =>  $this->description,
            'slug'            =>  $this->slug,
            'status'            =>  $this->status,
            'level_id'            =>  $this->level_id
        ]);

        session()->flash('message', 'Materia actualizada con exíto.');

        $this->resetInputFields();

        $this->emit('subjectStore');
    }

    public function delete($id)
    {
        Subjects::find($id)->delete();
        session()->flash('message', 'Materia eliminada con exíto.');
    }
    
}
