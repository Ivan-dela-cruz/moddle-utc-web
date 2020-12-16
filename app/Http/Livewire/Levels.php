<?php

namespace App\Http\Livewire;

use App\Level;
use Livewire\Component;

class Levels extends Component
{
    public  $levels, $name,$status, $data_id;
    public function render()
    {
        $this->levels = Level::all();
        return view('livewire.levels');
    }
    public function resetInputFields()
    {
    	$this->name = '';
        $this->status = '';
    }

    public function store()
    {
    	$validation = $this->validate([
    		'name'	=>	'required',
            'status' => 'required'
    	]);
    	Level::create($validation);
    	session()->flash('message', 'Ciclo creada con exíto.');
    	$this->resetInputFields();

    	$this->emit('levelStore');
    }

    public function edit($id)
    {
        $data = Level::findOrFail($id);
        $this->name = $data->name;
        $this->status = $data->status;
        $this->data_id = $id;
    }

    public function update()
    {
        $validation = $this->validate([
    		'name'	=>	'required',
            'status' => 'required'
    	]);

        $data = Level::find($this->data_id);
        $data->update([
            'name'       =>$this->name,
            'status' => $this->status
        ]);

        session()->flash('message', 'Ciclo actualizada con exíto.');

        $this->resetInputFields();

        $this->emit('levelStore');
    }

    public function delete($id)
    {
        Period::find($id)->delete();
        session()->flash('message', 'Ciclo eliminada con exíto.');
    }
}
