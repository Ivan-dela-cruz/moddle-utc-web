<?php

namespace App\Http\Livewire;
use App\Student;
use App\Subject;
use App\Level;
use App\Period;
use App\PeriodStudent as PeriodStudents;
use Livewire\Component;

class PeriodStudent extends Component
{
    public $data_id,$name, $last_name, $dni, $email,$status=true,$url_image,$passport,$instruction, $marital_status,$birth_date;
    public $modal = false, $input_search='',$action='POST';
    public $students, $periods, $levels, $subjects, $level_id='',$period_id='',$subject_id='';

    public function render()
    {
        $this->periods = Period::all();
        $this->levels = Level::all();
        $this->SubjectsByLevel();
        return view('livewire.period-student');
    }
   
    public function SubjectsByLevel()
    {
        $this->subjects = Subject::where('level_id',$this->level_id)->get();
    }

    public function loadData($student)
    {
        $this->data_id = $student->id;
        $this->name = $student->name;
        $this->last_name = $student->last_name;
        $this->dni = $student->dni;
        $this->email = $student->email;
        $this->status = $student->status;
        $this->url_image = $student->url_image;
        //CHANGE VALUE ACTION
        $this->action='POST';
    }
    public function findMember()
    {
        
        $student = Student::where('dni',$this->input_search)->first();
        if(!is_null($student)){
            $this->loadData($student);
            $this->alert('success','Registro recuperado satisfactoriamente',[
                'showCancelButton' =>  false, 
                'showConfirmButton' =>  false, 
            ]);  
        }else{
            $this->resetInputFields();
            $this->alert('warning','No se encontrarón registros asociados',[
                'showCancelButton' =>  false, 
                'showConfirmButton' =>  false, 
            ]);
        }
    }
    public function resetInputFields()
    {
    	$this->data_id = '';
        $this->name = '';
        $this->last_name = '';
        $this->dni = '';
        $this->email = '';
        $this->status = false;
        $this->url_image = '';

       
        $this->action='POST';
    }

    public function OpenList()
    {
        

    }
    public function store()
    {
       
        $validation = $this->validate([
    	
    		'period_id' => 'required',
            'level_id' => 'required',
            'subject_id' => 'required',
            'data_id' => 'required'
            
        ]);
        $inscription = PeriodStudents::where('period_id' ,  $this->period_id)
        ->where('level_id' ,  $this->level_id)
        ->where('subject_id' ,  $this->subject_id)
        ->where('student_id' ,  $this->data_id)
        ->where('status', $this->status)->first();
        
        if(is_null($inscription)){
           
            $data = [
                'period_id' => $this->period_id,
                'level_id' => $this->level_id,
                'subject_id' => $this->subject_id,
                'student_id' => $this->data_id,
                'status'=>$this->status
            ];
            PeriodStudents::create($data);
          
            $this->alert('success','¡Registro ingresado exitosamente!',[
                'showCancelButton' =>  false, 
                'showConfirmButton' =>  false, 
            ]); 
            $this->resetInputFields();
        }else{
            $this->alert('warning','¡Actualmente el estudiante ya se encuentra registrado!',[
                'showCancelButton' =>  false, 
                'showConfirmButton' =>  false, 
            ]); 
        }
        
       
    }
   

   
    public function edit($id)
    {
       
    }

    public function update()
    {
             
        $this->alert('success', 'Registro actualizado con exíto!',[
            'showCancelButton' =>  false, 
            'showConfirmButton' =>  false, 
        ]); 
        $this->resetInputFields();
    }

    public function delete($id)
    {
      
        $this->alert('success', 'Registro eliminado con exíto!',[
            'showCancelButton' =>  false, 
            'showConfirmButton' =>  false, 
        ]); 
    }
}
