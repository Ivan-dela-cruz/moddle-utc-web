<?php

namespace App\Http\Livewire;

use App\File;
use Livewire\Component;
use Livewire\WithPagination;
class Files extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '10'],

    ];
    public $perPage = '10';
    public $search = '';

    public  $status,$data_id;

    public function render()
    {
        $files = File::where('name', 'LIKE', "%{$this->search}%")
            ->orWhere('filename', 'LIKE', "%{$this->search}%")
            ->orWhere('size_file', 'LIKE', "%{$this->search}%")
            ->paginate($this->perPage);
        return view('livewire.files',compact('files'));
    }
  
    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
    }

    public function delete($id)
    {
        $file = File::find($id);
        $path=public_path($file->url_file);
        if (file_exists($path)) {
            unlink($path);
        }
        $file->delete();

        $this->alert('success', 'Registro eliminado con exíto.',[ 'showCancelButton' =>  false, ]);
    }
}
