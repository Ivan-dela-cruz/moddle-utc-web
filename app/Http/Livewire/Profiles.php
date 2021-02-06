<?php

namespace App\Http\Livewire;

use App\Student;
use App\Teacher;
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
    public $teacher_id, $user_id;
    public $position = 'tb_home';

    public function render()
    {
        $this->user = Auth::user();
        $this->students = Student::all();
        if (count($this->getErrorBag()->all()) > 0) {
            //   dd($this->getErrorBag()->getMessages());
            $this->emit('errors', $this->getErrorBag()->all());
        }
        $this->resetErrorBag();
        return view('livewire.profiles');
    }

    public function edit($id)
    {
        $this->resetErrorBag();
        if ($this->user->student) {
            $student = Student::find($id);
            $this->student_id = $student->id;
            $this->email = $student->email;
            $this->phone = $student->phone;
        } else if ($this->user->teacher) {
            $teacher = Teacher::find($id);
            $this->teacher_id = $teacher->id;
            $this->email = $teacher->email;
            $this->phone = $teacher->phone;
        }else{
            $user = User::find($id);
            $this->user_id = $user->id;
            $this->email = $user->email;
        }

        $this->position = 'tb_profile';
    }

    public function updatePhoto($id)
    {
        //  dd($this->url_image);
        if ($this->user->student) {
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

        } else if ($this->user->teacher) {
            $teacher = Teacher::find($id);
            if ($this->url_image != $teacher->url_image) {
                //save image
                $name = "file-" . time() . '.' . $this->url_image->getClientOriginalExtension();
                $path = 'users/' . $this->url_image->storeAs('/', $name, 'users');
            } else {
                $path = $teacher->url_image;
            }
            $teacher->update([
                'url_image' => $path
            ]);
            $teacher->user->update([
                'url_image' => $path
            ]);

        }else{
            $user = User::find($id);
            if ($this->url_image != $user->url_image) {
                //save image
                $name = "file-" . time() . '.' . $this->url_image->getClientOriginalExtension();
                $path = 'users/' . $this->url_image->storeAs('/', $name, 'users');
            } else {
                $path = $user->url_image;
            }
            $user->update([
                'url_image' => $path
            ]);
        }

        $this->alert('success', 'Foto actualizada con exito.', ['showCancelButton' => false,]);

    }

    public function removePhoto($id)
    {
        if ($this->user->student) {
            $student = Student::find($id);
            $path = 'img/user.jpg';
            $student->update([
                'url_image' => $path
            ]);
            $student->user->update([
                'url_image' => $path
            ]);
        } else if ($this->user->teacher) {
            $teacher = Teacher::find($id);
            $path = 'img/user.jpg';
            $teacher->update([
                'url_image' => $path
            ]);
            $teacher->user->update([
                'url_image' => $path
            ]);
        }else{
            $user = User::find($id);
            $path = 'img/user.jpg';
            $user->update([
                'url_image' => $path
            ]);
        }

        $this->resetInputFields();
        $this->alert('success', 'Foto eliminada con exito.', ['showCancelButton' => false,]);
    }

    public function update()
    {
        $this->validate([
            'phone' => 'required|numeric|digits:10'
        ], [
            'phone.required' => 'Ingrese un teléfono.',
            'phone.numeric' => 'Teléfono incorrecto.',
            'phone.digits' => 'Teléfono incorrecto.'
        ]);

        if ($this->user->student) {
            $student = Student::find($this->student_id);
            $student->update([
                'phone' => $this->phone
            ]);
        } else if ($this->user->teacher) {
            $teacher = Teacher::find($this->teacher_id);
            $teacher->update([
                'phone' => $this->phone
            ]);
        }


        $this->alert('success', 'Información actualizada con exito.', ['showCancelButton' => false,]);
    }

    public function updatePassword()
    {
        $this->validate([
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required'
        ], [
            'password.required' => 'Ingrese una contraseña.',
            'password_confirmation.required' => 'Confirme su contraseña.',
            'password.min' => 'Contraseña demasiado corta.',
            'password.confirmed' => 'Confirme su contraseña.',
        ]);

        if ($this->user->student) {
            $student = Student::find($this->student_id);
            $student->user->update([
                'password' => Hash::make($this->password),
            ]);
        } else if ($this->user->teacher) {
            $teacher = Teacher::find($this->teacher_id);
            $teacher->user->update([
                'password' => Hash::make($this->password),
            ]);
        }else{
            $user = User::find($this->user_id);
            $user->update([
                'password' => Hash::make($this->password),
            ]);
        }


        $this->resetInputFields();
        $this->alert('success', 'Contraseña actualizada con exito.', ['showCancelButton' => false,]);
    }

    public function resetInputFields()
    {
        $this->phone = '';
        $this->password = '';
        $this->password_confirmation = '';
    }
}
