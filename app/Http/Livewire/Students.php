<?php

namespace App\Http\Livewire;

use App\User;
use App\Student;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
class Students extends Component
{
    use WithFileUploads;
    public $students, $data_id, $user_id,$name, $last_name, $url_image, $email, $dni, $status;
    
    public function render()
    {
        $this->students = Student::all();
        return view('livewire.students');
    }
    public function resetInputFields()
    {
    	$this->name = '';
    	$this->last_name = '';
        $this->url_image = '';
        $this->email = '';
        $this->dni = '';
        $this->status = '';
        $this->user_id = '';
    }

    public function store()
    {
    	$validation = $this->validate([
    		'name'	=>	'required',
            'last_name' => 'required',
            'url_image' => 'image|max:1024',
            'email' => 'required|email|unique:users',
            'dni' => 'required|unique:students',
            'status' => 'required'
        ]);
        $password = bcrypt($this->dni);
        $user = User::create(['name'=>$this->name,'email'=>$this->email,'password'=>$password]);
        $name = "file-" . time() . '.' .  $this->url_image->getClientOriginalExtension();
        $path =  $this->url_image->storeAs('/',$name,'students');
        $data =  [
            'user_id'=>$user->id,
            'name'=>$this->name,
            'last_name'=>$this->last_name,
            'url_image'=> 'students/'.$path,
            'email'=> $this->email,
            'dni'=> $this->dni,
            'status'=> $this->status
        ];
        
        Student::create($data);
        
        session()->flash('message', 'Estudiante creado con exíto.');
        
    	$this->resetInputFields();

    	$this->emit('studentStore');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $this->name = $student->name;
    	$this->last_name = $student->last_name;
        $this->url_image = $student->url_image;
        $this->email = $student->email;
        $this->dni = $student->dni;
        $this->status = $student->status;
        $this->data_id = $id;
    }

    public function update()
    {
        $validation = $this->validate([
    		'name'	=>	'required',
            'last_name' => 'required',
            'url_image' => 'image|max:1024',
            'email' => ['required',Rule::unique('users')->ignore($this->data_id)],
            'dni' => ['required',Rule::unique('students')->ignore($this->data_id)],
            'status' => 'required'
        ]);

        $data = Student::find($this->data_id);
        $name = "file-" . time() . '.' .  $this->url_image->getClientOriginalExtension();
        $path =  $this->url_image->storeAs('/',$name,'students');

        $data->update([
            'name'=>$this->name,
            'last_name'=>$this->last_name,
            'url_image'=>'students/'.$path,
            'email'=> $this->email,
            'dni'=> $this->dni,
            'status'=> $this->status
        ]);

        session()->flash('message', 'Estudante actualizado con exíto.');

        $this->resetInputFields();

        $this->emit('studentStore');
    }

    public function delete($id)
    {
        Student::find($id)->delete();
        session()->flash('message', 'Estudiante eliminado con exíto.');
    }
    
}
