<?php

namespace App\Http\Livewire;

use App\Subject as Subjects;
use Livewire\Component;
use App\Level;
use Livewire\WithPagination;

class Subject extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '10'],

    ];
    public $perPage = '10';
    public $search = '';

    public  $levels, $name, $description, $slug, $status=1, $data_id,$level_id;

    public function render()
    {
        $this->levels = Level::all();
    	$subjects = Subjects::where('name', 'LIKE', "%{$this->search}%")
            ->orWhere('description', 'LIKE', "%{$this->search}%")
            ->orWhere('slug', 'LIKE', "%{$this->search}%")
            ->paginate($this->perPage);

        return view('livewire.subject',compact('subjects'));
    }

    public function resetInputFields()
    {
    	$this->name = '';
    	$this->description = '';
        $this->slug = '';
        $this->status = '';
        $this->level_id = '';
    }

    public function store()
    {
    	$validation = $this->validate([
    		'name'	=>	'required',
    		'description' => 'required',
            'slug' => 'required',
            'status' => 'required',
            'level_id' => 'required'
    	],[
    	    'name.required' => 'Campo obligatorio.',
    	    'description.required' => 'Campo obligatorio.',
    	    'slug.required' => 'Campo obligatorio.',
    	    'status.required' => 'Campo obligatorio.',
    	    'level_id.required' => 'Campo obligatorio.',
        ]);
    	Subjects::create($validation);
    	$this->alert('success', 'Materia registrada con exíto.',[ 'showCancelButton' =>  false, ]);
    	$this->resetInputFields();

    	$this->emit('subjectStore');
    }

    public function edit($id)
    {
        $data = Subjects::findOrFail($id);
        $this->name = $data->name;
        $this->description = $data->description;
        $this->slug = $data->slug;
        $this->level_id = $data->level_id;
        $this->data_id = $id;
        $this->status = $data->status ;
    }

    public function update()
    {
        $validate = $this->validate([
            'name' => 'required',
            'description' => 'required',
            'slug' => 'required',
            'status' => 'required',
            'level_id' => 'required'
        ],[
            'name.required' => 'Campo obligatorio.',
            'description.required' => 'Campo obligatorio.',
            'slug.required' => 'Campo obligatorio.',
            'status.required' => 'Campo obligatorio.',
            'level_id.required' => 'Campo obligatorio.',
        ]);

        $data = Subjects::find($this->data_id);

        $data->update([
            'name'       =>   $this->name,
            'description'         =>  $this->description,
            'slug'            =>  $this->slug,
            'status'            =>  $this->status,
            'level_id'            =>  $this->level_id
        ]);

        $this->alert('success', 'Materia actualizada con exíto.',[ 'showCancelButton' =>  false, ]);

        $this->resetInputFields();

        $this->emit('subjectStore');
    }

    public function delete($id)
    {
        Subjects::find($id)->delete();
        $this->alert('success', 'Materia eliminada con exíto.',[ 'showCancelButton' =>  false, ]);
    }
    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
    }

}
