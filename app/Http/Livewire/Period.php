<?php

namespace App\Http\Livewire;


use App\Period as Periods;
use Livewire\Component;

class Period extends Component
{
    public  $periods, $name, $start_date, $end_date, $status, $data_id;

    public function render()
    {
    	$this->periods = Periods::all();
    	
        return view('livewire.period');
    }

    public function resetInputFields()
    {
    	$this->name = '';
    	$this->start_date = '';
        $this->end_date = '';
        $this->status = '';
    }

    public function store()
    {
    	$validation = $this->validate([
    		'name'	=>	'required',
    		'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required'
    	]);
    	Periods::create($validation);
    	session()->flash('message', 'Periodo creada con exíto.');
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
    }

    public function update()
    {
        $validation = $this->validate([
    		'name'	=>	'required',
    		'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required'
    	]);

        $data = Periods::find($this->data_id);

        $data->update([
            'name'       =>   $this->name,
            'start_date' =>  $this->start_date,
            'end_date'  =>  $this->end_date,
            'status' => $this->status
        ]);

        session()->flash('message', 'Periodo actualizada con exíto.');

        $this->resetInputFields();

        $this->emit('periodStore');
    }

    public function delete($id)
    {
        Periods::find($id)->delete();
        session()->flash('message', 'Periodo eliminada con exíto.');
    }
}
