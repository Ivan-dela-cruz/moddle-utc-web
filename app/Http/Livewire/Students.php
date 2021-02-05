<?php

namespace App\Http\Livewire;

use App\Address\Address;
use App\Address\Canton;
use App\Address\Parish;
use App\Address\Province;
use App\User;
use App\Student;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Students extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '10'],

    ];
    public $perPage = '10';
    public $search = '';

    public $data_id, $user_id, $name, $last_name, $url_image, $email, $dni, $status = 1;
    public $passport, $instruction, $marital_status, $birth_date, $phone;

    public $provinces, $cantons, $parishes, $address;
    public $province_id, $canton_id, $parish_id;

    public function render()
    {
        $students = Student::where('name', 'LIKE', "%{$this->search}%")
            ->orWhere('last_name', 'LIKE', "%{$this->search}%")
            ->orWhere('email', 'LIKE', "%{$this->search}%")
            ->orWhere('dni', 'LIKE', "%{$this->search}%")
            ->orWhere('passport', 'LIKE', "%{$this->search}%")
            ->orWhere('created_at', 'LIKE', "%{$this->search}%")
            ->paginate($this->perPage);

        $this->provinces = Province::all();
        $this->cantonByProvince();
        $this->parishByCanton();

        return view('livewire.students', compact('students'));
    }

    public function cantonByProvince()
    {
        $this->cantons = Canton::where('province_id', $this->province_id)->get();
    }

    public function parishByCanton()
    {
        $this->parishes = Parish::where('canton_id', $this->canton_id)->get();
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
        $this->province_id = '';
        $this->canton_id = '';
        $this->parish_id = '';
        $this->address = '';
    }

    public function store()
    {
        $validation = $this->validate([
            'name' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u|max:255',
            'last_name' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u|max:255',
            'email' => 'required|email|unique:students',
            'dni' => 'required|unique:students|numeric|digits:10',
            'birth_date' => 'required',
            'status' => 'required',
            'province_id' => 'required',
            'canton_id' => 'required',
            'parish_id' => 'required',
            'address' => 'required',
        ], [
            'name.required' => 'Campo obligatorio.',
            'last_name.required' => 'Campo obligatorio.',
            'name.regex' => 'Nombre incorrecto.',
            'last_name.regex' => 'Nombre incorrecto.',
            'email.required' => 'Campo obligatorio.',
            'dni.required' => 'Campo obligatorio.',
            'dni.numeric' => 'DNI incorrecto.',
            'dni.digits' => 'DNI incorrecto.',
            'email.unique' => 'Correo en uso, intente con otro',
            'dni.unique' => 'DNI en uso.',
            'birth_date.required' => 'Campo obligatorio.',
            'status.required' => 'Campo obligatorio.',
            'province_id.required' => 'Campo obligatorio.',
            'canton_id.required' => 'Campo obligatorio.',
            'parish_id.required' => 'Campo obligatorio.',
            'address.required' => 'Campo obligatorio.',
        ]);

        $passport = null;
        if ($this->passport != '') {
            $this->validate(['passport' => 'numeric|unique:students,passport'], ['passport.numeric' => 'Pasaporte incorrecto.', 'passport.unique' => 'PAsaporte en uso.']);
            $passport = $this->passport;
        }
        $password = bcrypt($this->dni);

        $path = 'img/user.jpg';
        if ($this->url_image != '') {
            $this->validate(['url_image' => 'image'], ['url_image.image' => 'La imagen debe ser de formato: .jpg,.jpeg ó .png']);
            //save image
            $name = "file-" . time() . '.' . $this->url_image->getClientOriginalExtension();
            $path = 'students/' . $this->url_image->storeAs('/', $name, 'students');
        }

        $user = User::create([
            'name' => $this->name,
            'last_name' => $this->last_name,
            'url_image' => $path,
            'email' => $this->email,
            'password' => $password
        ]);


        $data = [
            'user_id' => $user->id,
            'name' => $this->name,
            'last_name' => $this->last_name,
            'url_image' => $path,
            'email' => $this->email,
            'dni' => $this->dni,
            'passport' => $passport,
            'instruction' => $this->instruction,
            'marital_status' => $this->marital_status,
            'birth_date' => $this->birth_date,
            'phone' => $this->phone,
            'status' => $this->status
        ];

        Student::create($data);

        $user->assignRole('Estudiante');

        $address = Address::create([
            'address' => $this->address,
            'user_id' => $user->id,
            'parish_id' => $this->parish_id
        ]);

        $this->alert('success', 'Estudiante registrado con exíto.', ['showCancelButton' => false,]);

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
        $this->user_id = $student->user_id;
        $this->province_id = $student->user->address->parish->canton->province->id;
        $this->canton_id = $student->user->address->parish->canton->id;
        $this->parish_id = $student->user->address->parish->id;
        $this->address = $student->user->address->address;
    }

    public function update()
    {
        $validation = $this->validate([
            'name' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u|max:255',
            'last_name' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u|max:255',
            // 'url_image' => 'image|max:1024',
            'email' => ['required', Rule::unique('students')->ignore($this->data_id)],
            'dni' => ['required', Rule::unique('students')->ignore($this->data_id), 'numeric', 'digits:10'],
            'status' => 'required',
            'province_id' => 'required',
            'canton_id' => 'required',
            'parish_id' => 'required',
            'address' => 'required',
        ], [
            'name.required' => 'Campo obligatorio.',
            'last_name.required' => 'Campo obligatorio.',
            'name.regex' => 'Nombre incorrecto.',
            'last_name.regex' => 'Nombre incorrecto.',
            'email.required' => 'Campo obligatorio.',
            'dni.required' => 'Campo obligatorio.',
            'email.unique' => 'Correo en uso, intente con otro',
            'dni.unique' => 'DNI en uso.',
            'dni.numeric' => 'DNI incorrecto.',
            'dni.digits' => 'DNI incorrecto.',
            'status.required' => 'Campo obligatorio.',
            'province_id.required' => 'Campo obligatorio.',
            'canton_id.required' => 'Campo obligatorio.',
            'parish_id.required' => 'Campo obligatorio.',
            'address.required' => 'Campo obligatorio.',
        ]);

        $user = User::find($this->user_id);
        $data = Student::find($this->data_id);

        $passport = null;
        if ($this->passport != '') {
            $this->validate(['passport' => ['numeric', Rule::unique('students')->ignore($this->data_id),]], ['passport.numeric' => 'Pasaporte incorrecto.', 'passport.unique' => 'Pasaporte en uso.']);
            $passport = $this->passport;
        }

        if ($this->url_image != $data->url_image) {
            $this->validate(['url_image' => 'image'], ['url_image.image' => 'La imagen debe ser de formato: .jpg,.jpeg ó .png']);
            //save image
            $name = "file-" . time() . '.' . $this->url_image->getClientOriginalExtension();
            $path = 'students/' . $this->url_image->storeAs('/', $name, 'students');
        } else {
            $path = $data->url_image;
        }

        $user->update([
            'name' => $this->name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'url_image' => $path,
            'status' => $this->status
        ]);

        $user->address->update([
            'address' => $this->address,
            'user_id' => $user->id,
            'parish_id' => $this->parish_id
        ]);

        $data->update([
            'name' => $this->name,
            'last_name' => $this->last_name,
            'url_image' => $path,
            'email' => $this->email,
            'dni' => $this->dni,
            'passport' => $this->passport,
            'instruction' => $this->instruction,
            'marital_status' => $this->marital_status,
            'birth_date' => $this->birth_date,
            'phone' => $this->phone,
            'status' => $this->status
        ]);

        $this->alert('success', 'Estudante actualizado con exíto.', ['showCancelButton' => false,]);

        $this->resetInputFields();

        $this->emit('studentStore');
    }

    public function delete($id, $user_id)
    {
        Student::find($id)->delete();
        $user = User::find($user_id);
        $user->update([
            'status' => 0,
        ]);
        $this->alert('success', 'Estudiante eliminado con exíto.', ['showCancelButton' => false,]);
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
    }

}
