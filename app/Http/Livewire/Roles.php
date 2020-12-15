<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as HasRoles;

class Roles extends Component
{
    public  $roles,$permissions,$name, $description, $status, $data_id;

    public function render()
    {
        $this->roles = HasRoles::all();
        $this->permissions = Permission::all();
       //->groupBy('modulo')
    	
        return view('livewire.roles');
    }

    public function resetInputFields()
    {
    	$this->name = '';
    	$this->description = '';
        $this->status = '';
    }

    public function store()
    {
    	$validation = $this->validate([
    		'name'	=>	'required',
    		'description' => 'required',
    		'status' => 'required'
    	]);
        $role = HasRoles::create($validation);
        $role->save();
        $role->syncPermissions($request->get('permissions'));

    	session()->flash('message', 'Role creado con exíto.');
    	$this->resetInputFields();
    }

    public function edit($id)
    {
        $data = HasRoles::findOrFail($id);
        $this->name = $data->name;
        $this->description = $data->description;
        $this->status = $data->status;
        $this->data_id = $id;
    }

    public function update()
    {
        $validate = $this->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        $role = HasRoles::find($this->data_id);

        $role->update([
            'name' => $this->name,
            'description'  =>  $this->description,
            'status' =>  $this->status
        ]);
         // revocamos todos los permisos otorgados
        $role->revokePermissionTo(Permission::all());
        // sincronizar los nuevos permisos
        $role->syncPermissions($request->get('permissions'));
        
        session()->flash('message', 'Role actualizada con exíto.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        HasRoles::find($id)->delete();
        session()->flash('message', 'Role eliminada con exíto.');
    }
}
