<?php

namespace App\Http\Livewire;

use App\Period;
use App\Education;
use Livewire\Component;

class CourseList extends Component
{
    public $filters  = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','W','X','Y','Z',''];
    private $letter = '';
    public $period = null;
    public $education = null,$show_list=true, $show_detail=false;
    public function mount()
    {
        $this->period = Period::latest('id')->first();
    }
    public function render()
    {
        $lists = Education::where('academic_period_id',$this->period->id)
        ->where('name','LIKE', '%'.$this->letter.'%')
        ->orderBy('created_at','DESC')
        ->get();
      
        return view('livewire.course-list',compact('lists'));
    }

    function slectLetter($var)
    {
        $this->letter=$this->filters[$var];
      
    }

    public function show($id)
    {
        $this->education = Education::find($id);
        if(!is_null($this->education)){
            $this->show_list = false;
            $this->show_detail = true;
        }
    }
    public function showList(){
        $this->show_list = true;
        $this->show_detail = false;
        $this->education = null;
    }

   
}
