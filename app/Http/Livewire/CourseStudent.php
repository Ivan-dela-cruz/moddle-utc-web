<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CourseStudent extends Component
{
    public $content;
    public function render()
    {
        return view('livewire.course-student');
    }
    public function store()
    {
       dd($this->content);
    }
}
