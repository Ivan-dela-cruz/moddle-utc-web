<?php

namespace App\Http\Livewire;

use App\Subject as Subjects;
use Livewire\Component;


class Subject extends Component
{
    public  $subjects, $name, $description, $slug, $status, $data_id;

    public function render()
    {
    	$this->subjects = Subjects::all();
    	
        return view('livewire.subject');
    }

    public function resetInputFields()
    {
    	$this->name = '';
    	$this->description = '';
        $this->slug = '';
    }

    public function store()
    {
    	$validation = $this->validate([
    		'name'	=>	'required',
    		'description' => 'required',
    		'slug' => 'required'
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
        $this->data_id = $id;
    }

    public function update()
    {
        $validate = $this->validate([
            'name' => 'required',
            'description' => 'required',
            'slug' => 'required'
        ]);

        $data = Subjects::find($this->data_id);

        $data->update([
            'name'       =>   $this->name,
            'description'         =>  $this->description,
            'slug'            =>  $this->slug
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
