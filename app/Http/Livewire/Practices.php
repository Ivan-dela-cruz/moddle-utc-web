<?php

namespace App\Http\Livewire;

use App\Level;
use App\Period;
use App\PeriodStudent as PeriodStudents;
use App\Student;
use App\Subject;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use function Sodium\add;


class Practices extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '10'],

    ];
    public $perPage = '10';
    public $search = '';

    public $students, $periods, $levels, $subjects, $level_id = '', $period_id = '', $subject_id = '';
    public $parallel, $status = true;

    public function render()
    {
        $this->periods = Period::all();
        //$this->levels = Level::all();
        $this->SubjectsByLevel();
        //$this->students = Student::all();
        $this->students = DB::table('students')
            ->join('period_students', 'students.id', 'period_students.student_id')
            ->where('period_students.level_id', $this->level_id)
            ->where('period_students.subject_id', $this->subject_id)
            ->where('period_students.status', $this->status)
            ->select('students.*')
            ->get();
       /// dd($this->students);
        return view('livewire.practices');
    }

    public function SubjectsByLevel()
    {
        $this->subjects = Subject::where('level_id', $this->level_id)->get();
    }

    /* public function findStudents()
     {
         $this->students = PeriodStudents::where('period_id', $this->period_id)
             ->where('level_id', $this->level_id)
             ->where('subject_id', $this->subject_id)
             //->where('parallel' ,  $this->parallel)
             ->where('status', $this->status)->get();
     }*/

    public function clear()
    {
        $this->search = '';
        $this->page = 1;
        $this->perPage = '10';
    }
}
