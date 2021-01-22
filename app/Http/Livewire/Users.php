<?php

namespace App\Http\Livewire;

use App\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use function Symfony\Component\String\u;

class Users extends Component
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

    //from data
    public $name, $last_name, $email, $password, $password_confirmation;
    public $url_image, $status = 1;
    public $user_id, $uRoles = null;
    public $roles, $roles_selected;
    public $view = 'create', $select_id = 'roles_create';


    public function render()
    {
        $users = User::where('name', 'LIKE', "%{$this->search}%")
            ->orWhere('last_name', 'LIKE', "%{$this->search}%")
            ->orWhere('email', 'LIKE', "%{$this->search}%")
            ->orWhere('created_at', 'LIKE', "%{$this->search}%")
            ->paginate($this->perPage);
        $this->roles = Role::where('status', 1)->get(["name", "id"]);
        //dd($roles);
        return view('livewire.users', compact('users'));
    }

    public function create(){
        $this->resetInputFields();
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required'
        ], [
            'name.required' => 'Campo obligatorio.',
            'last_name.required' => 'Campo obligatorio.',
            'email.required' => 'Campo obligatorio.',
            'email.email' => 'El correo no es valido.',
            'email.unique' => 'El correo ya esta en uso, intente con otro.',
            'password.required' => 'Campo obligatorio.',
            'password_confirmation.required' => 'Campo obligatorio.',
            'password.min' => 'Contraseña demasiado corta.',
            'password.confirmed' => 'No se ha confirmado la contraseña.',
        ]);

        $path = 'img/user.jpg';
        if ($this->url_image != '') {
            $this->validate(['url_image' => 'image'], ['url_image.image' => 'La imagen debe ser de formato: .jpg,.jpeg ó .png']);
            //save image
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
       // dd($this->roles_selected);
        $user = User::create($data);
        $user->roles()->sync($this->roles_selected);
        $this->alert('success', 'Usuario creado con exíto.');
        $this->resetInputFields();
        $this->emit('studentStore');
    }

    public function edit($id)
    {
        $this->view = 'edit';
        $this->select_id = 'roles_edit';
        $user = User::find($id);
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->url_image = $user->url_image;
        $this->status = $user->status;
        $this->uRoles = $user->roles->pluck('id');
       // dd($this->uRoles);
        //$roles = $user->roles->pluck('id');

           //dd($this->roles_selected);
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user_id)],
        ], [
            'name.required' => 'Campo obligatorio.',
            'last_name.required' => 'Campo obligatorio.',
            'email.required' => 'Campo obligatorio.',
            'email.email' => 'El correo no es valido.',
            'email.unique' => 'El correo ya esta en uso, intente con otro.',
        ]);

        $user = User::find($this->user_id);
        if($this->password != ''){
            $this->validate([
                'password' => 'required|confirmed|min:8',
                'password_confirmation' => 'required'
            ],[
                'password.required' => 'Campo obligatorio.',
                'password_confirmation.required' => 'Campo obligatorio.',
                'password.min' => 'Contraseña demasiado corta.',
                'password.confirmed' => 'No se ha confirmado la contraseña.',
            ]);

            $pass = Hash::make($this->password);
        }else{
            $pass = $user->password;
        }
        if ($this->url_image != $user->url_image) {
            $this->validate(['url_image' => 'image'], ['url_image.image' => 'La imagen debe ser de formato: .jpg,.jpeg ó .png']);
            //save image
            $name = "file-" . time() . '.' . $this->url_image->getClientOriginalExtension();
            $path = 'users/' . $this->url_image->storeAs('/', $name, 'users');
        } else {
            $path = $user->url_image;
        }

       // dd($this->roles_selected);
        $user->update([
            'name' => $this->name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'url_image' => $path,
            'password' => $pass,
            'status' => $this->status,
        ]);
        if($this->roles_selected != null){
            $user->roles()->detach();
            $user->syncRoles($this->roles_selected);
        }


        $this->alert('success', 'Usuario actualizado con exíto.');
        $this->emit('studentStore');
       // $this->resetInputFields();
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
        $this->view = 'create';
        $this->select_id = 'roles_create';
        $this->name = '';
        $this->last_name = '';
        $this->url_image = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->status = 1;
        $this->roles_selected ;
        $this->uRoles = null;
    }
}
