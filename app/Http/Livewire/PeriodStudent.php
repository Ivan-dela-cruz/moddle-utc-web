<?php

namespace App\Http\Livewire;
use App\Student;
use Livewire\Component;

class PeriodStudent extends Component
{
    public $data_id,$name, $last_name, $dni, $email,$status=true,$url_image,$passport,$instruction, $marital_status,$birth_date;
    public $modal = false, $input_search='',$action='POST';
    public $students;
    public function render()
    {
        return view('livewire.period-student');
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
        $this->action='PUT';
    }
    public function findMember()
    {
        $student = Student::where('dni',$this->input_search)->first();
        if(isset($student)){
            $this->alert('success','Registro recuperado satisfactoriamente');
            $this->loadData($student);
        }else{
            $this->resetInputFields();
            $this->alert('warning','No se encontrarón registros asociados');
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
        
       $this->alert('success','¡Registro ingresado exitosamente!');
    }
   

   
    public function edit($id)
    {
       
    }

    public function update()
    {
             
        $this->alert('success', 'Registro actualizado con exíto!');
        $this->resetInputFields();
    }

    public function delete($id)
    {
      
        $this->alert('success', 'Registro eliminado con exíto!',[
            'position' =>  'bottom-end']);
    }
}
