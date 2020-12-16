<?php

namespace App\Http\Livewire;
use App\User;
use App\Teacher;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Teachers extends Component
{
    public $teachers, $data_id, $user_id,$name, $last_name, $url_image, $email,$profession, $dni, $status;
    public function render()
    {
        $this->teachers = Teacher::all();
        return view('livewire.teachers');
    }
    public function resetInputFields()
    {
    	$this->name = '';
    	$this->last_name = '';
        $this->url_image = '';
        $this->email = '';
        $this->dni = '';
        $this->status = '';
        $this->profession = '';
        $this->user_id = '';
    }

    public function store()
    {
    	$validation = $this->validate([
    		'name'	=>	'required',
    		'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'dni' => 'required|unique:teachers',
            'status' => 'required',
            'profession' => 'required'
        ]);
        $password = bcrypt($this->dni);
        $user = User::create(['name'=>$this->name,'email'=>$this->email,'password'=>$password]);
        $data =  [
            'user_id'=>$user->id,
            'name'=>$this->name,
            'last_name'=>$this->last_name,
            'url_image'=> $this->url_image,
            'email'=> $this->email,
            'dni'=> $this->dni,
            'profession'=> $this->profession,
            'status'=> $this->status
        ];
        Teacher::create($data);
        
        session()->flash('message', 'Profesor creado con exíto.');
        
    	$this->resetInputFields();

    	$this->emit('teacherStore');
    }

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        $this->name = $teacher->name;
    	$this->last_name = $teacher->last_name;
        $this->url_image = $teacher->url_image;
        $this->email = $teacher->email;
        $this->dni = $teacher->dni;
        $this->profession = $teacher->profession;
        $this->status = $teacher->status;
        $this->data_id = $id;
    }

    public function update()
    {
        $validation = $this->validate([
    		'name'	=>	'required',
    		'last_name' => 'required',
            'email' => ['required',Rule::unique('users')->ignore($this->data_id)],
            'dni' => ['required',Rule::unique('teachers')->ignore($this->data_id)],
            'profession' =>'required',
            'status' => 'required'
        ]);

        $data = Teacher::find($this->data_id);

        $data->update([
            'name'=>$this->name,
            'last_name'=>$this->last_name,
            'url_image'=> $this->url_image,
            'email'=> $this->email,
            'dni'=> $this->dni,
            'profession'=> $this->profession,
            'status'=> $this->status
        ]);

        session()->flash('message', 'Profesor actualizado con exíto.');

        $this->resetInputFields();

        $this->emit('studentStore');
    }

    public function delete($id)
    {
        Teacher::find($id)->delete();
        session()->flash('message', 'Profesor eliminado con exíto.');
    }
} 
