<?php

namespace App\Http\Livewire;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '5'],

    ];
    public $perPage = '10';
    public $search = '';

    //from data
    public $name, $last_name, $email, $password, $password_confirmation;
    public $url_image, $status = 1;
    public $user_id;

   /* protected $rules = [
        'name' => 'required',
        'last_name' => 'required',
        'email' => ['required', 'email', 'unique:users,email'],
        //'url_image' => 'required|image',

    ];
    protected $messages = [
        'name.required' => 'Compa obligatorio.',
        'last_name.required' => 'Compa obligatorio.',
        'email.required' => 'Compa obligatorio.',
        'email.email' => 'El correo no es valido.',
        'email.unique' => 'El correo ya esta en uso, intente con otro.',
    ];*/

    public function render()
    {
        $users = User::where('name', 'LIKE', "%{$this->search}%")
            ->orWhere('email', 'LIKE', "%{$this->search}%")
            ->orWhere('created_at', 'LIKE', "%{$this->search}%")
            ->paginate($this->perPage);
        return view('livewire.users', compact('users'));
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required'
        ],[
            'name.required' => 'Compa obligatorio.',
            'last_name.required' => 'Compa obligatorio.',
            'email.required' => 'Compa obligatorio.',
            'email.email' => 'El correo no es valido.',
            'email.unique' => 'El correo ya esta en uso, intente con otro.',
            'password.required' => 'Compa obligatorio.',
            'password_confirmation.required' => 'Compa obligatorio.',
            'password.min' => 'Contraseña demasiado corta.',
            'password.confirmed' => 'No se ha confirmado la contraseña.',
        ]);

        $path = 'img/user.jpg';
        if ($this->url_image != '') {
            $this->validate(['url_image' => 'image'], ['url_image.image' => 'La imagen debe ser de formato: .jpg,.jpeg ó .png']);

         /*   $this->rules = array_merge($this->rules, ['url_image' => 'image']);
            $this->messages = array_merge($this->messages, ['url_image.image' => 'La imagen debe ser de formato: .jpg,.jpeg ó .png']);
         */   //save image
            $name = "file-" . time() . '.' . $this->url_image->getClientOriginalExtension();
            $path = 'users/' . $this->url_image->storeAs('/', $name, 'users');
        }
       // $this->validate();
        $data = [
            'name' => $this->name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'url_image' => $path,
            'password' => Hash::make($this->password),
            'status' => $this->status,
        ];

        $user = User::create($data);
        $this->alert('success', 'Usuario creado con exíto.');
        $this->resetInputFields();
        $this->emit('studentStore');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->url_image = $user->url_image;
        $this->status = $user->status;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user_id)],
        ],[
            'name.required' => 'Compa obligatorio.',
            'last_name.required' => 'Compa obligatorio.',
            'email.required' => 'Compa obligatorio.',
            'email.email' => 'El correo no es valido.',
            'email.unique' => 'El correo ya esta en uso, intente con otro.',
        ]);

        $user = User::find($this->user_id);

        if ($this->url_image != $user->url_image) {
            $this->validate(['url_image' => 'image'], ['url_image.image' => 'La imagen debe ser de formato: .jpg,.jpeg ó .png']);
            //save image
            $name = "file-" . time() . '.' . $this->url_image->getClientOriginalExtension();
            $path = 'users/' . $this->url_image->storeAs('/', $name, 'users');
        } else {
            $path = $user->url_image;
        }

        $user->update([
            'name' => $this->name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'url_image' => $path,
            'password' => Hash::make($this->password),
            'status' => $this->status,
        ]);

        $this->alert('success', 'Usuario actualizado con exíto.');

        $this->resetInputFields();

        $this->emit('studentStore');

    }

    public function delete($id)
    {
        User::find($id)->delete();
        $this->alert('success', 'Usuario eliminado con exíto.');
    }


    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->last_name = '';
        $this->url_image = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->status = 1;
    }
}
