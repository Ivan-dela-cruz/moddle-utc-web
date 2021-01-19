<?php

namespace App\Http\Livewire;


use App\Period as Periods;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Period extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '5'],

    ];
    public $perPage = '10';
    public $search = '';

    public   $name, $start_date, $end_date, $status = true, $data_id, $url_image, $color = "#ffffff";

    public function render()
    {
    	$periods = Periods::where('start_date', 'LIKE', "%{$this->search}%")
            ->orWhere('end_date', 'LIKE', "%{$this->search}%")
            ->orWhere('name', 'LIKE', "%{$this->search}%")
            ->paginate($this->perPage);
        return view('livewire.period',compact('periods'));
    }

    public function resetInputFields()
    {
    	$this->name = '';
    	$this->start_date = '';
        $this->end_date = '';
        $this->status = true;
        $this->url_image = '';
        $this->color = '#ffffff';
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
    }

    public function store()
    {
    	$validation = $this->validate([
    		'name'	=>	'required',
    		'start_date' => 'required',
            'end_date' => 'required',
            'url_image' => 'image|max:1024',
            'status' => 'required',
        ]);
        $name = "file-" . time() . '.' .  $this->url_image->getClientOriginalExtension();
        $path =  $this->url_image->storeAs('/',$name,'periods');
        $data =  [
            'name'=>$this->name,
            'start_date'=>$this->start_date,
            'url_image'=> 'periods/'.$path,
            'end_date'=> $this->end_date,
            'status'=> $this->status
        ];
    	Periods::create($data);
    	$this->alert('success', 'Periodo creada con exíto.');
    	$this->resetInputFields();

    	$this->emit('periodStore');
    }

    public function edit($id)
    {
        $data = Periods::findOrFail($id);
        $this->name = $data->name;
        $this->start_date = $data->start_date;
        $this->end_date = $data->end_date;
        $this->status = $data->status;
        $this->data_id = $id;
        $this->url_image = $data->url_image;
        $this->color = $data->color;
    }

    public function update()
    {
        $validation = $this->validate([
    		'name'	=>	'required',
    		'start_date' => 'required',
            'end_date' => 'required',
            'url_image' => 'image|max:1024',
            'status' => 'required'
    	]);

        $data = Periods::find($this->data_id);
        $name = "file-" . time() . '.' .  $this->url_image->getClientOriginalExtension();
        $path =  $this->url_image->storeAs('/',$name,'periods');
        $data->update([
            'name'       =>   $this->name,
            'start_date' =>  $this->start_date,
            'end_date'  =>  $this->end_date,
            'url_image'=>'periods/'.$path,
            'status' => $this->status
        ]);

        $this->alert('success', 'Periodo actualizada con exíto.');
        $this->resetInputFields();
        $this->emit('periodStore');
    }

    public function delete($id)
    {
        Periods::find($id)->delete();
        $this->alert('success', 'Periodo eliminada con exíto.');
    }
}
