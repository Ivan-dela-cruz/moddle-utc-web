<?php

namespace App\Http\Livewire;

use App\Student;
use App\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use App\PeriodStudent as PeriodStudents;
use Livewire\WithFileUploads;

class Profiles extends Component
{
    use WithFileUploads;
    public $user;
    public $students;

    public $student_id, $name, $last_name, $url_image, $dni, $passport, $instruction, $marital_status, $birth_date, $phone, $email;
    public $password, $password_confirmation;

    public $position = 'tb_home';
    public function render()
    {
        $this->user = Auth::user();
        $this->students = Student::all();
        if(count($this->getErrorBag()->all()) > 0){
            //   dd($this->getErrorBag()->getMessages());
            $this->emit('errors',$this->getErrorBag()->all());
        }
        return view('livewire.profiles');
    }

    public function edit($id)
    {
        $this->resetErrorBag();
        $student = Student::find($id);
        $this->student_id = $student->id;
      //  $this->name = $student->name;
      //  $this->last_name = $student->last_name;
        //$this->url_image = $student->url_image;
        $this->email = $student->email;
        //$this->dni = $student->dni;
        //$this->passport = $student->passport;
        //$this->instruction = $student->instruction;
        //$this->marital_status = $student->marital_status;
        //$this->birth_date = $student->birth_date;
        $this->phone = $student->phone;
        $this->position = 'tb_profile';
    }

    public function updatePhoto($id){
      //  dd($this->url_image);
        $student = Student::find($id);
        if ($this->url_image != $student->url_image) {
            //save image
            $name = "file-" . time() . '.' . $this->url_image->getClientOriginalExtension();
            $path = 'users/' . $this->url_image->storeAs('/', $name, 'users');
        } else {
            $path = $student->url_image;
        }
        $student->update([
            'url_image' => $path
        ]);
        $student->user->update([
            'url_image' => $path
        ]);

        $this->alert('success', 'Foto actualizada con exito.',[ 'showCancelButton' =>  false, ]);

    }

    public function removePhoto($id){
        $student = Student::find($id);
        $path = 'img/user.jpg';
        $student->update([
            'url_image' => $path
        ]);
        $student->user->update([
            'url_image' => $path
        ]);
        $this->resetInputFields();
        $this->alert('success', 'Foto eliminada con exito.',[ 'showCancelButton' =>  false, ]);
    }

    public function update(){
       $this->validate([
           'phone' => 'required|numeric|digits:10'
        ],[
            'phone.required' => 'Ingrese un teléfono.',
           'phone.numeric' => 'Teléfono incorrecto.',
           'phone.digits' => 'Teléfono incorrecto.'
        ]);
        $student = Student::find($this->student_id);
        $student->update([
           'phone' => $this->phone
        ]);

        $this->alert('success', 'Información actualizada con exito.',[ 'showCancelButton' =>  false, ]);
    }

    public function updatePassword(){
        $this->validate([
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required'
        ],[
            'password.required' => 'Ingrese una contraseña.',
            'password_confirmation.required' => 'Confirme su contraseña.',
            'password.min' => 'Contraseña demasiado corta.',
            'password.confirmed' => 'Confirme su contraseña.',
        ]);

        $student = Student::find($this->student_id);
        $student->user->update([
            'password' => Hash::make($this->password),
        ]);
        $this->resetInputFields();
        $this->alert('success', 'Contraseña actualizada con exito.',[ 'showCancelButton' =>  false, ]);
    }

    public function resetInputFields(){
        $this->phone = '';
        $this->password = '';
        $this->password_confirmation = '';
    }
}
