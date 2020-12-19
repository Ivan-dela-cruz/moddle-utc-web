<?php

namespace App\Http\Livewire;

use App\File;
use Livewire\Component;

class Files extends Component
{
    public  $files,$name,$description,$url_file,$status,$data_id;

    public function render()
    {
        $this->files = File::all();
        return view('livewire.files');
    }
    public function resetInputFields()
    {
    	$this->name = '';
    	$this->description = '';
        $this->url_file = '';
        $this->status = '';
    }

    public function store()
    {
    	$validation = $this->validate([
    		'name'	=>	'required',
    		'description' => 'required',
            'url_file' => 'required',
            'status' => 'required'
        ]);

        $data =  [
            'name'=>$this->name,
            'description'=>$this->description,
            'url_file'=> $this->url_file,
            'status'=> $this->status
        ];
        File::create($data);
        
        session()->flash('message', 'Archivo creado con exíto.');
        
    	$this->resetInputFields();

    	$this->emit('fileStore');
    }

    public function edit($id)
    {
        $file = File::findOrFail($id);
        $this->name = $file->name;
    	$this->description = $file->description;
        $this->url_file = $file->url_file;
        $this->data_id = $id;
    }

    public function update()
    {
        $validation = $this->validate([
    		'name'	=>	'required',
    		'description' => 'required',
            'url_file' => 'required',
            'status' => 'required'
        ]);

        $data = File::find($this->data_id);

        $data->update([
            'name'=>$this->name,
            'description'=>$this->description,
            'url_file'=> $this->url_file,
            'status'=> $this->status
        ]);

        session()->flash('message', 'Tarea actualizado con exíto.');

        $this->resetInputFields();

        $this->emit('fileStore');
    }

    public function delete($id)
    {
        File::find($id)->delete();
        session()->flash('message', 'Tarea eliminado con exíto.');
    }
}
