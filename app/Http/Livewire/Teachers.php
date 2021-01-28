<?php

namespace App\Http\Livewire;
use App\User;
use App\Teacher;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Teachers extends Component
{
    use WithFileUploads;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '10'],

    ];
    public $perPage = '10';
    public $search = '';

    public  $data_id, $user_id,$name, $last_name, $url_image, $email,$profession, $dni, $status=1;
    public function render()
    {
        $teachers = Teacher::where('name', 'LIKE', "%{$this->search}%")
            ->orWhere('last_name', 'LIKE', "%{$this->search}%")
            ->orWhere('email', 'LIKE', "%{$this->search}%")
            ->orWhere('dni', 'LIKE', "%{$this->search}%")
            ->orWhere('profession', 'LIKE', "%{$this->search}%")
            ->orWhere('created_at', 'LIKE', "%{$this->search}%")
            ->paginate($this->perPage);
        return view('livewire.teachers', compact('teachers'));
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
    		'name'	=>	'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u|max:255',
    		'last_name' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u|max:255',
            'email' => 'required|email|unique:users',
            'dni' => 'required|unique:teachers|numeric|digits:10',
            'status' => 'required',
            'profession' => 'required'
        ],[
            'name.required' => 'Campo obligatorio.',
            'last_name.required' => 'Campo obligatorio.',
            'name.regex' => 'Nombre incorrecto.',
            'last_name.regex' => 'Nombre incorrecto.',
            'email.required' => 'Campo obligatorio.',
            'email.email' => 'El correo no es valido.',
            'email.unique' => 'Correo en uso, intente con otro.',
            'dni.required' => 'Campo obligatorio.',
            'dni.numeric' => 'DNI incorrecto.',
            'dni.digits' => 'DNI incorrecto.',
            'dni.unique' => 'DNI en uso.',
            'status.required' => 'Campo obligatorio.',
            'profession.required' => 'Campo obligatorio.',
        ]);
        $password = bcrypt($this->dni);

        $path = 'img/user.jpg';
        if ($this->url_image != '') {
            $this->validate(['url_image' => 'image'], ['url_image.image' => 'La imagen debe ser de formato: .jpg,.jpeg ó .png']);
            //save image
            $name = "file-" . time() . '.' . $this->url_image->getClientOriginalExtension();
            $path = 'teachers/' . $this->url_image->storeAs('/', $name, 'teachers');
        }

        $user = User::create([
            'name'=>$this->name,
            'last_name'=>$this->last_name,
            'url_image' => $path,
            'email'=>$this->email,
            'password'=>$password
        ]);

        $data =  [
            'user_id'=>$user->id,
            'name'=>$this->name,
            'last_name'=>$this->last_name,
            'url_image'=> $path,
            'email'=> $this->email,
            'dni'=> $this->dni,
            'profession'=> $this->profession,
            'status'=> $this->status
        ];
        Teacher::create($data);

        $user->assignRole('Profesor');

        $this->alert('success', 'Profesor creado con exíto.',[ 'showCancelButton' =>  false, ]);

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
        $this->user_id = $teacher->user_id;
    }

    public function update()
    {
        $validation = $this->validate([
    		'name'	=>	'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u|max:255',
    		'last_name' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u|max:255',
            'email' => ['required',Rule::unique('users')->ignore($this->user_id),'email'],
            'dni' => ['required',Rule::unique('teachers')->ignore($this->data_id),'numeric','digits:10'],
            'profession' =>'required',
            'status' => 'required'
        ],[
            'name.required' => 'Campo obligatorio.',
            'last_name.required' => 'Campo obligatorio.',
            'name.regex' => 'Nombre incorrecto.',
            'last_name.regex' => 'Nombre incorrecto.',
            'email.required' => 'Campo obligatorio.',
            'email.email' => 'El correo no es valido.',
            'email.unique' => 'Correo en uso, intente con otro.',
            'dni.required' => 'Campo obligatorio.',
            'dni.numeric' => 'DNI incorrecto.',
            'dni.digits' => 'DNI incorrecto.',
            'dni.unique' => 'DNI en uso.',
            'status.required' => 'Campo obligatorio.',
            'profession.required' => 'Campo obligatorio.',
        ]);

        $user = User::find($this->user_id);
        $data = Teacher::find($this->data_id);

        if ($this->url_image != $data->url_image) {
            $this->validate(['url_image' => 'image'], ['url_image.image' => 'La imagen debe ser de formato: .jpg,.jpeg ó .png']);
            //save image
            $name = "file-" . time() . '.' . $this->url_image->getClientOriginalExtension();
            $path = 'teachers/' . $this->url_image->storeAs('/', $name, 'teachers');
        } else {
            $path = $data->url_image;
        }

        $user->update([
            'name' => $this->name,
            'last_name'=>$this->last_name,
            'email'=> $this->email,
            'url_image' => $path,
            'status' => $this->status
        ]);

        $data->update([
            'name'=>$this->name,
            'last_name'=>$this->last_name,
            'url_image'=>$path,
            'email'=> $this->email,
            'dni'=> $this->dni,
            'profession'=> $this->profession,
            'status'=> $this->status
        ]);


        $this->alert('success', 'Profesor actualizado con exíto.',[ 'showCancelButton' =>  false, ]);

        $this->resetInputFields();

        $this->emit('studentStore');
    }

    public function delete($id, $user_id)
    {
        $teacher = Teacher::find($id)->delete();
        $user = User::find($user_id);
        $user->update([
            'status' => 0,
        ]);
        $this->alert('success', 'Profesor eliminado con exíto.',[ 'showCancelButton' =>  false, ]);
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
    }
}

