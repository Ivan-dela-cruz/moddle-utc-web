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
    public $students, $data_id, $user_id,$name, $last_name, $url_image, $email, $dni, $status = 1;
    public $passport,$instruction, $marital_status,$birth_date,$phone;
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
        $this->status = 1;
        $this->user_id = '';
        $this->passport = '';
        $this->instruction = '';
        $this->marital_status = '';
        $this->birth_date = '';
        $this->phone = '';
    }

    public function store()
    {
    	$validation = $this->validate([
    		'name'	=>	'required',
            'last_name' => 'required',
            'url_image' => 'image|max:1024',
            'email' => 'required|email|unique:students',
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
            'passport' => $this->passport,
            'instruction' => $this->instruction,
            'marital_status' => $this->marital_status,
            'birth_date' => $this->birth_date,
            'phone' => $this->phone,
            'status'=> $this->status
        ];
        
        Student::create($data);
        
        $this->alert('success', 'Estudiante creado con exíto.');
        
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
        $this->passport = $student->passport;
        $this->instruction = $student->instruction;
        $this->marital_status = $student->marital_status;
        $this->birth_date = $student->birth_date;
        $this->phone = $student->phone;
    }

    public function update()
    {
        $validation = $this->validate([
    		'name'	=>	'required',
            'last_name' => 'required',
            'url_image' => 'image|max:1024',
            'email' => ['required',Rule::unique('students')->ignore($this->data_id)],
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
            'passport' => $this->passport,
            'instruction' => $this->instruction,
            'marital_status' => $this->marital_status,
            'birth_date' => $this->birth_date,
            'phone' => $this->phone,
            'status'=> $this->status
        ]);

        $this->alert('success', 'Estudante actualizado con exíto.');

        $this->resetInputFields();

        $this->emit('studentStore');
    }

    public function delete($id)
    {
        Student::find($id)->delete();
        $this->alert('success', 'Estudiante eliminado con exíto.');
    }
    
}
