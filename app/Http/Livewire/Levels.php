<?php

namespace App\Http\Livewire;

use App\Level;
use Livewire\Component;
use Livewire\WithPagination;

class Levels extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '10'],

    ];
    public $perPage = '10';
    public $search = '';

    public $name, $status = 1, $data_id;

    public function render()
    {
        $levels = Level::where('name', 'LIKE', "%{$this->search}%")
            ->paginate($this->perPage);
        return view('livewire.levels', compact('levels'));
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->status = 1;
    }

    public function store()
    {
        $validation = $this->validate([
            'name' => 'required',
            'status' => 'required'
        ], [
            'name.required' => 'Campo obligatorio.',
            'status.required' => 'Campo obligatorio.',
        ]);
        Level::create($validation);
        $this->alert('success', 'Ciclo creada con exíto.',[ 'showCancelButton' =>  false, ]);
        $this->resetInputFields();

        $this->emit('levelStore');
    }

    public function edit($id)
    {
        $data = Level::findOrFail($id);
        $this->name = $data->name;
        $this->status = $data->status;
        $this->data_id = $id;
    }

    public function update()
    {
        $validation = $this->validate([
            'name' => 'required',
            'status' => 'required'
        ], [
            'name.required' => 'Campo obligatorio.',
            'status.required' => 'Campo obligatorio.',
        ]);

        $data = Level::find($this->data_id);
        $data->update([
            'name' => $this->name,
            'status' => $this->status
        ]);

        $this->alert('success', 'Ciclo actualizada con exíto.',[ 'showCancelButton' =>  false, ]);

        $this->resetInputFields();

        $this->emit('levelStore');
    }

    public function delete($id)
    {
        Level::find($id)->delete();
        $this->alert('success', 'Ciclo eliminada con exíto.',[ 'showCancelButton' =>  false, ]);
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
    }
}
