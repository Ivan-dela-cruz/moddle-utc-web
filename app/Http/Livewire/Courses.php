<?php

namespace App\Http\Livewire;
use App\Period;
use App\Level;
use App\Course;
use App\Teacher;
use App\Subject;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\This;

class Courses extends Component
{
   
    public  $courses ,$levels,$subjects,$teachers,$periods, $name,$description,$career ,$url_image,$content,$status,$teacher_id,$academic_period_id,$level_id,$subject_id, $data_id;

    public function render()
    {
        $this->levels = Level::all();
        $this->courses = Course::all();
        $this->subjects = Subject::all();
        $this->teachers = Teacher::all();
        $this->periods = Period::all();
    	
        return view('livewire.courses');
    }

    public function resetInputFields()
    {
    	$this->name = '';
    	$this->description = '';
        $this->career = '';
        $this->url_image = '';
        $this->content = '';
        $this->status = '';
        $this->teacher_id = '';
        $this->academic_period_id = '';
        $this->level_id = '';
        $this->subject_id = '';
       
    }

    public function store()
    { 
    	$validation = $this->validate([
    		'name'	=>	'required',
    		'description' => 'required',
            'career' => 'required',
            'url_image' => 'required',
            'content' => 'required',
            'status' => 'required',
            'teacher_id' => 'required',
            'academic_period_id' => 'required',
            'level_id' => 'required',
            'subject_id' => 'required'
        ]);
        
        $id = Auth::user()->id;
                 
        $teacher = Teacher::find($id);
        $data =  [
            'teacher_id'=>$teacher->id,
            'name'=>$this->name,
            'description'=>$this->description,
            'career'=> $this->career,
            'url_image'=> $this->url_image,
            'content'=> $this->content,
            'status'=> $this->status,
            'teacher_id'=> $this->teacher_id,
            'academic_period_id'=> $this->academic_period_id,
            'level_id'=> $this->level_id,
            'subject_id'=> $this->subject_id,
        ];
        Course::create($data);
    	session()->flash('message', 'Curso creado con exíto.');
    	$this->resetInputFields();
    	$this->emit('courseStore');
    }

    public function edit($id)
    {
        $data = Course::findOrFail($id);
        $this->name = $data->name;
        $this->description = $data->description;
        $this->career = $data->career;
        $this->url_image = $data->url_image;
        $this->content = $data->content;
        $this->status = $data->status;
        $this->teacher_id = $data->teacher_id;
        $this->academic_period_id = $data->academic_period_id;
        $this->level_id = $data->level_id;
        $this->subject_id = $data->subject_id;
        $this->data_id = $id;
    }

    public function update()
    {
        $validation = $this->validate([
            'name'	=>	'required',
    		'description' => 'required',
            'career' => 'required',
            'url_image' => 'required',
            'content' => 'required',
            'status' => 'required',
            'teacher_id' => 'required',
            'academic_period_id' => 'required',
            'level_id' => 'required',
            'subject_id' => 'required'
        ]);

        $data = Course::find($this->data_id);

        $data->update([
            'name'       =>   $this->name,
            'start_date' =>  $this->start_date,
            'end_date'  =>  $this->end_date,
            'status' => $this->status,
            'teacher_id' => $this->teacher_id,
            'academic_period_id'=> $this->academic_period_id,
            'level_id'=> $this->level_id,
            'subject_id'=> $this->subject_id,
        ]);

        session()->flash('message', 'Curso actualizada con exíto.');

        $this->resetInputFields();

        $this->emit('courseStore');
    }

    public function delete($id)
    {
        Course::find($id)->delete();
        session()->flash('message', 'Curso eliminada con exíto.');
    }
}
